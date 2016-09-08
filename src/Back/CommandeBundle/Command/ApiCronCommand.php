<?php
namespace Back\CommandeBundle\Command;

use Back\CommandeBundle\Entity\Checkc;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ApiCronCommand extends ContainerAwareCommand
{
    private $output;

    protected function configure()
    {
        $this
            ->setName('apicron:run')
            ->setDescription('Runs Cron Api if needed')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<comment>Running Cron Tasks...</comment>');
        $this->output = $output;
		ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $commands = $em->getRepository('BackCommandeBundle:Command')->findBy(array("etat" => 4 ,"caisse"=>"26"));
        $caisse = $em->getRepository('BackCommandeBundle:Caisse')->find(26);
        $total = $caisse->getMontantEspece();
        $totalprice=$total+3;
        $text = "";
        $api_key='bccd3d465f272a58335bb91b';

        function httpGet($url)
        {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            //  curl_setopt($ch,CURLOPT_HEADER, false);
            $output=curl_exec($ch);
            curl_close($ch);
            return $output;
        }
        $status_code='';
        foreach ($commands as $command) {

            $coupon = $command->getCoupon();
            $barcode = $coupon[0]->getAramexid();
            $get_api=httpGet("http://5.196.15.248/api/bigdealcoupon/tracking/barcode/".$barcode."/api_key/bccd3d465f272a58335bb91b/format/json");
            //$get_api = '[{"id":1,"status_code":"101","status_label":"Enlevement effectue","update_date":"2016-01-22 17:48:49"},{"id":2,"status_code":"104","status_label":"Livraison effectuee","update_date":"2016-01-23"}]';
            $count = count(json_decode($get_api));
            $json_data = json_decode($get_api, true);
            $output->writeln($barcode);
            if(isset($json_data[$count - 1])) {
            $status_code = $json_data[$count - 1]['status_code'];
            $output->writeln('<comment>' . $status_code . '</comment>');
            $nombreDeCouponPourValiderDeal = $command->getReference()->getAnnexe()->getMinCoupon();
            $nombreAcheteur = $em->getRepository('BackDealBundle:Deal')->findNombreAcheteur($command->getDeal()->getId());

            if ($status_code == '104') {

                $command->setEtat(1);

                foreach ($coupon as $value) {
                    $totalprice=$totalprice+($value->getPrice());
                    $output->writeln($value->getPrice());
                    if ($nombreAcheteur >= $nombreDeCouponPourValiderDeal) {
                        $value->setVendu(3);
                    } else {
                        $value->setVendu(2);
                    }
                    $em->persist($value);
                    $em->flush();
                }
                $caisse->setMontantEspece($totalprice);
                $em->persist($caisse);
                $em->persist($command);
                $em->flush();

                /*$client = $this->get('security.context')->getToken()->getUser();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Confirmation de pré-commande ' . $command->getId())
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($client->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderLivr.html.twig', array("client" => $client, "commande" => $commande, "mode" => "Espèce")));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);*/

                   /* camouflage*/
            } else if (($status_code == '123456')) {
                $command->setEtat(3);
                $em->persist($command);
                $em->flush();

                foreach ($coupon as $value) {
                    if ($nombreAcheteur >= $nombreDeCouponPourValiderDeal) {
                        $value->setVendu(3);
                    } else {
                        $value->setVendu(2);
                        $em->persist($value);
                        $em->flush();
                    }
                    /* $client = $this->get('security.context')->getToken()->getUser();
                     $message = \Swift_Message::newInstance()
                         ->setSubject('Confirmation de pré-commande ' . $command->getId())
                         ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                         ->setTo($client->getEmail())
                         ->setBody($this->renderView('MainFrontBundle:Email:annullerrderLivr.html.twig', array("client" => $client, "commande" => $command, "mode" => "Livraison")));
                     $message->setContentType("text/html");
                     $this->get('mailer')->send($message);*/
                }

                sleep(5);



            }


        }

        }
    }

    private function runCommand($string)
    {
        // Split namespace and arguments
        $namespace = split(' ', $string)[0];

        // Set input
        $command = $this->getApplication()->find($namespace);
        $input = new StringInput($string);

        // Send all output to the console
        $returnCode = $command->run($input, $this->output);

        return $returnCode != 0;
    }
}