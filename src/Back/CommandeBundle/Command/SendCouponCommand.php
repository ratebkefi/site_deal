<?php
namespace Back\CommandeBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Common\PrintCoupon;

class SendCouponCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('bigdeal:sendcoupon')
            ->setDescription('Envoyer les coupons payer au clients');
        //->addArgument('name', InputArgument::OPTIONAL, 'Qui voulez vous saluer??')
        //->addOption('yell', null, InputOption::VALUE_NONE, 'Si définie, la tâche criera en majuscules');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $command = $em->getRepository('BackCommandeBundle:Command')->getCommandPayedCoupon();
        $text = "";

        foreach ($command as $value) {
            $text .= " - " . $value->getId() . "commande_".$value->getId().".pdf\n";
        }


        $output->writeln($text);
    }
}