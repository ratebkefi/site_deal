<?php
namespace Back\CommandeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\CommandeBundle\Entity\PaymentMethod;

class LoadPaymentData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $payment = new PaymentMethod();
        $payment->setAct(true);
        $payment->setName('espece');
        $manager->persist($payment);

        $payment = new PaymentMethod();
        $payment->setAct(true);
        $payment->setName('cheque');
        $manager->persist($payment);
        $manager->flush();

        $payment = new PaymentMethod();
        $payment->setAct(true);
        $payment->setName('BigFid');
        $manager->persist($payment);
        $manager->flush();

        $payment = new PaymentMethod();
        $payment->setAct(true);
        $payment->setName('GPG');
        $manager->persist($payment);
        $manager->flush();
    }
}