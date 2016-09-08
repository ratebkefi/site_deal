<?php


namespace Back\DashBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Back\DashBundle\Common\Tools;
use Back\DashBundle\Entity\BigFidHistorique;

class expiredBigFidCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bigdeal:expiredbigfid')
            ->setDescription('Expired sold BigFid after 3 month');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $command = $em->getRepository('BackDashBundle:BigFidHistorique')->findExpiredBigFid();
        foreach($command as $value)
        {
           // echo $value->getClient()->getId();
            $soldeAcuis = $value->getMontant();
            $soldConsome = $em->getRepository("BackDashBundle:BigFidHistorique")->findSoldeConsomeByClient($value->getId());
            $parent = $em->getRepository("BackDashBundle:BigFidHistorique")->find($value->getId());
            $client = $em->getRepository("BackCommandeBundle:Client")->find($value->getClient()->getId());
            if($soldeAcuis>$soldConsome)
            {
                $historiqueBigFid = new BigFidHistorique();
                $historiqueBigFid->setDcr(new \dateTime());
                $historiqueBigFid->setMontant($soldeAcuis - $soldConsome);
                $historiqueBigFid->setMotif("Expired BigFid");
                $historiqueBigFid->setClient($client);
                $historiqueBigFid->setParent($parent);
                $em->persist($historiqueBigFid);
                $em->flush();
            }

        }

        $output->writeln("traite");
        //$output->writeln($tot." commandes sont épuisées");
    }
}