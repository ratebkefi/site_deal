<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LocaliteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocaliteRepository extends EntityRepository
{
    public function findbyname($str){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select( 'entity' )
            ->from( $this->getEntityName(), 'entity' );
        $qb->andWhere(  "entity.name like '%".$str."%'" );
        return $qb->getQuery()
            ->getResult();

    }
}
