<?php

namespace Back\ContractBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AnnexeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnexeRepository extends EntityRepository
{
    public function findByPeriede($dated,$datef){
        $qb = $this->createQueryBuilder('p')

            ->Where("p.dcr >='".$dated->format('Y-m-d')."'")
            ->andWhere("p.dcr <='".$datef->format('Y-m-d')."'");
        //echo $qb->getQuery()->getSQL();exit;
        return $qb->getQuery()->getResult();
    }
}