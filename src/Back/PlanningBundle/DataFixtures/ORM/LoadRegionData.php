<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 18/06/2015
 * Time: 08:17
 */

namespace Back\PlanningBundle\DataFixtures\Orm;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\PlanningBundle\Entity\Region;

class LoadRegionData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $region=new Region();
        $region->setName("Grand tunis");
        $manager->persist($region);
        $manager->flush();
        $region=new Region();
        $region->setName("Sahel");
        $manager->persist($region);
        $manager->flush();
        $region=new Region();
        $region->setName("Cap Bon");
        $manager->persist($region);
        $manager->flush();
    }
}