<?php

namespace Back\PlanningBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function getFormOption(){
        $categories = $this->findAll();
        $ret = array();
        foreach( $categories as $cat ){

            if( !$cat->getParent()  ){
                if(count($cat->getCategory())==null)
                $ret[ $cat->getId() ]=$cat;
                continue;
            }

            else if(!array_key_exists($cat->getParent()->getName(), $ret) ){
                $ret[ $cat->getParent()->getName() ] = array();
            }

            $ret[ $cat->getParent()->getName() ][ $cat->getId() ] = $cat;

        }

        return $ret;

    }
}