<?php
namespace Back\CommandeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\CommandeBundle\Entity\Bank;

class LoadBankData  implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Al Baraka');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Amen Bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Arab Banking Corporation onshore');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Arab Tunisian Bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Attijari bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque d\'Habitat');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque de Tunisie');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque de Tunisie et des Emirats');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque financement Pet. et Moy. Entreprises');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Franco-Tunisienne');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Internationale Arabe de Tunisie');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Nationale Agricole');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Tunisienne de Solidarité');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Tuniso-Koweitienne');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Tuniso-Libyenne');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Banque Zitouna');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Citi-Bank Tunis Branch onshore');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('North Africa International Bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Qatar National Bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Société Tunisienne de Banque');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Stusid Bank');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Union Bancaire Commerce et Industrie');
        $manager->persist($banque);
        $manager->flush();

        $banque = new Bank();
        $banque->setAct(true);
        $banque->setName('Union Internationale de Banques');
        $manager->persist($banque);
        $manager->flush();
    }

}