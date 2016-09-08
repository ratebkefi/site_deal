<?php
namespace Back\PageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\PageBundle\Entity\Pages;
use Back\DashBundle\Common\Tools;
class LoadPageData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page = new Pages();
        $page->setName("Qui sommes nous");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("Conditions générales");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("FAQ");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("Votre Activité sur BIGDeal.tn");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("Qui sommes nous");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("Protection des données Pesonnelle");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("En savoir plus");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();

        $page = new Pages();
        $page->setName("Politique de confidentialité");
        $page->setBody("");
        $page->setAlias(Tools::string2url($page->getName()));
        $manager->persist($page);
        $manager->flush();


    }
}