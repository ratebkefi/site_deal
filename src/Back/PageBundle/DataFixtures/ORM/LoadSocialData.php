<?php
namespace Back\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\PageBundle\Entity\Socialmedia;
use Back\DashBundle\Common\Tools;
class LoadSocialData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page = new Socialmedia();
        $page->setIcon("fa fa-facebook");
        $page->setLien("https://www.facebook.com/bigdeal.tn");
        $page->setOrd(1);
        $manager->persist($page);
        $manager->flush();

        $page = new Socialmedia();
        $page->setIcon("fa fa-twitter");
        $page->setLien("https://twitter.com/bigdeal_tn");
        $page->setOrd(2);
        $manager->persist($page);
        $manager->flush();


    }
}