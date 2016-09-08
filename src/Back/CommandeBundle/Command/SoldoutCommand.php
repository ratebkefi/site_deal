<?php


namespace Back\CommandeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Back\DashBundle\Common\Tools;

class SoldoutCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bigdeal:soldout')
            ->setDescription('rendre les command non paye epuise lorsque le stock est epuise');
        //->addArgument('name', InputArgument::OPTIONAL, 'Qui voulez vous saluer??')
        //->addOption('yell', null, InputOption::VALUE_NONE, 'Si définie, la tâche criera en majuscules');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $command = $em->getRepository('BackCommandeBundle:Command')->findBy(array('etat' => 1));
        $text = "";
        $tot = 0;
        $txt = "";
        $rst = 0;
        $reference = null;
        $ArrRef = array();
        foreach ($command as $value) {

                foreach ($value->getCoupon() as $valcoupon) {
                    if (in_array($valcoupon->getVendu(),array(2,3))) {
                        $ArrRef[$value->getReference()->getId()][] = 1;
                    }
                }


        }
        $command = $em->getRepository('BackCommandeBundle:Command')->findBy(array('etat' => array(0,2)));
        foreach($command as $value){
            $reference=$value->getReference();
            $maxcoupon=$reference->getMaxCoupon();
            if($maxcoupon<=count($ArrRef[$reference->getId()])){
                $value->setEtat(2);
            }else{
                $value->setEtat(0);
            }
            $em->persist($value);
            $em->flush();
        }


        $output->writeln("traite");
        //$output->writeln($tot." commandes sont épuisées");
    }
}