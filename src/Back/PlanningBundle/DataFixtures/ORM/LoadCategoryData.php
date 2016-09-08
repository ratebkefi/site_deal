<?php
namespace Back\PlanningBundle\DataFixtures\Orm;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Back\PlanningBundle\Entity\Category;
use Back\PlanningBundle\Entity\requiredInfo;

class LoadCategoryData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        // Café et Resto
        $cafresto = new Category();
        $cafresto->setName("Café et Resto");
        $cafresto->setColor("#4747ff");
        $manager->persist($cafresto);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($cafresto);
        $manager->persist($question);
        $manager->flush();
        // Café
        $caf = new Category();
        $caf->setName("Café");
        $caf->setColor("#000094");

        $caf->setParent($cafresto);
        $manager->persist($caf);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($caf);
        $manager->persist($question);
        $manager->flush();
        // Resto
        $caf = new Category();
        $caf->setName("Restaurant");
        $caf->setColor("#00f");
        $caf->setParent($cafresto);
        $manager->persist($caf);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($caf);
        $manager->persist($question);
        $manager->flush();
        // Beauté et Spa
        $beatespa = new Category();
        $beatespa->setName("Beauté et Spa");
        $beatespa->setColor("#ff0f0f");
        $manager->persist($beatespa);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beatespa);
        $manager->persist($question);
        $manager->flush();
        // Beauté
        $beaute = new Category();
        $beaute->setName("Beauté");
        $beaute->setColor("#f00");

        $beaute->setParent($beatespa);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Soins capilaires

        $beaute = new Category();
        $beaute->setName("Soins capilaires");
        $beaute->setColor("#f00");

        $beaute->setParent($beatespa);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Soins capilaires
        $beaute = new Category();
        $beaute->setName("Spa et thalasso");
        $beaute->setColor("#f00");
        $beaute->setParent($beatespa);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Loisir & Bien être
        $loisirbienetre = new Category();
        $loisirbienetre->setName("Loisir & Bien être");
        $loisirbienetre->setColor("#00a300");
        $manager->persist($loisirbienetre);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($loisirbienetre);
        $manager->persist($question);
        $manager->flush();
        //  Sport
        $beaute = new Category();
        $beaute->setName("Sport");
        $beaute->setColor("#008000");
        $beaute->setParent($loisirbienetre);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        //   Amincissement et Diet
        $beaute = new Category();
        $beaute->setName("Amincissement et Diet");
        $beaute->setColor("#008000");
        $beaute->setParent($loisirbienetre);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        //   Jeux et Attractions
        $beaute = new Category();
        $beaute->setName("Jeux et Attractions");
        $beaute->setColor("#008000");
        $beaute->setParent($loisirbienetre);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();

        // Lifestyle & Accessoires
        $lifstyle = new Category();
        $lifstyle->setName("Lifestyle & Accessoires");
        $lifstyle->setColor("#f60");
        $manager->persist($lifstyle);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($lifstyle);
        $manager->persist($question);
        $manager->flush();
        // Permis de conduire
        $beaute = new Category();
        $beaute->setName("Permis de conduire");
        $beaute->setColor("#f60");

        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Permis de conduire
        $beaute = new Category();
        $beaute->setName("Formation");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Permis de conduire
        $beaute = new Category();
        $beaute->setName("Boutiques");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Permis de conduire
        $beaute = new Category();
        $beaute->setName("Auto et Moto");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        //  Deco et Maison
        $beaute = new Category();
        $beaute->setName("Deco et Maison");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        //  Deco et Maison
        $beaute = new Category();
        $beaute->setName("Accessoires et Bijoux");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        //  Photos et Services
        $beaute = new Category();
        $beaute->setName("Photos et Services");
        $beaute->setColor("#f60");
        $beaute->setParent($lifstyle);
        $manager->persist($beaute);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Lifestyle & Accessoires
        $shopping = new Category();
        $shopping->setName("Shopping");
        $shopping->setNational(true);
        $shopping->setColor("#7a7aff");
        $manager->persist($shopping);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
        // Lifestyle & Accessoires
        $ticket = new Category();
        $ticket->setName("Tickets");
        $ticket->setNational(true);
        $ticket->setColor("#ffff52");
        $manager->persist($ticket);
        $manager->flush();
        $question = new requiredInfo();
        $question->setQuestion("Nombre de coupons maximal par client");
        $question->setCategoryId($beaute);
        $manager->persist($question);
        $manager->flush();
    }

}