<?php
namespace Back\DashBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\DashBundle\Entity\Entreprise;

class LoadEntrepriseData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $company = new Entreprise();
        $company->setLibelle('Bigdeal');
        $company->setAdresse('Immeuble  Espace Tunis , Bureau H1-6, 1073 Montplaisir, Tunis');
        $company->setGerant('Issam Essefi');
        $company->setTel('71903563');
        $company->setMf('1226527L/A/M/000');
        $company->setEmail("direction@bigdeal.tn");
        $manager->persist($company);
        $manager->flush();

        $company = new Entreprise();
        $company->setLibelle('Yasmine Technology');
        $company->setAdresse('Immeuble Avicenne 5ème Bureau 4000 Sousse');
        $company->setGerant('Imed Essefi');
        $company->setTel('73228722');
        $company->setEmail("imeddine.essefi@gmail.com");
        $company->setMf('1377937P/A/M/000');
        $manager->persist($company);
        $manager->flush();


    }

}