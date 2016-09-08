<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\Query\Expression;
/**
 * BigFidHistoriqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BigFidHistoriqueRepository extends EntityRepository
{
public function findBigFidRecu($idClient)
{

}
    public function findExpiredBigFid()
    {
    $now = new \dateTime();
        $prev_date = date('Y-m-d H:i:s', strtotime($now->format('Y-m-d H:i:s') .' -3 month'));
        $query = $this->getEntityManager()
            ->createQuery("select hist from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.dcr <= '".$prev_date."'
                            and hist.operation =1
                             ");
        return $query->getResult();
//
    }

    public function verifierSiConsomer($montant,$idParent)
    {
        $query = $this->getEntityManager()
            ->createQuery("select SUM(hist.montant) as soldAcuis from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.operation = 0
                             ");
        $resultatSoldAcuis = $query->getResult();
        $soldAcuis = $resultatSoldAcuis[0]["soldAcuis"];
if($soldAcuis == $montant)
    return false;
elseif($montant > $soldAcuis)

    return true;

    }

    public function findSoldeAcuisByClient1($idClient)
    {
        $query = $this->getEntityManager()
            ->createQuery("select hist from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.client =  " . $idClient . "
                            and hist.operation = 1
                             ");

        return $query->getResult();
    }
    public function findSoldeAcuisByClient($idClient)
    {
        $query = $this->getEntityManager()
            ->createQuery("select SUM(hist.montant) as soldAcuis from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.client =  " . $idClient . "
                            and hist.operation =1
                             ");
        $resultatSoldAcuis = $query->getResult();
		$soldAcuis = $resultatSoldAcuis[0]["soldAcuis"];

        return $soldAcuis;
    }

    public function findSoldeConsomeByClient($idClient)
    {
        $query = $this->getEntityManager()
            ->createQuery("select SUM(hist.montant) as soldConsome from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.operation = 0
                            and hist.client =  " . $idClient . "

                             ");

        $resultatSoldConsome = $query->getResult();

        $soldConsome = $resultatSoldConsome[0]["soldConsome"];

        return $soldConsome;
    }
    public function soldeBigFidClient($idClient)
    {
        $queryAcuis = $this->getEntityManager()
            ->createQuery("select SUM(hist.montant) as soldAcuis from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.client =  '" . $idClient . "'
                            and hist.operation =1
                             ");
        $resultatAcuis = $queryAcuis->getResult();
 $soldAcuis = $resultatAcuis[0]["soldAcuis"];


        //return $queryAcuis->getResult();

        $queryConsome = $this->getEntityManager()
            ->createQuery("select SUM(hist.montant) as soldConsome from
                            Back\DashBundle\Entity\BigFidHistorique as hist
                            where hist.client =  '" . $idClient . "'
                            and hist.operation =0
                             ");
        $resultatSoldConsome = $queryConsome->getResult();
        $soldConsome = $resultatSoldConsome[0]["soldConsome"];

        return $soldAcuis - $soldConsome;
    }
}