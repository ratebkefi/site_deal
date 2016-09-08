<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function init()
    {
        date_default_timezone_set('Africa/Tunis');
        parent::init();
    }

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            //new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            // vendors
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
            new WhiteOctober\TCPDFBundle\WhiteOctoberTCPDFBundle(),
            new DCS\RatingBundle\DCSRatingBundle(),


            // website
            new Back\DashBundle\BackDashBundle(),
            new Back\PlanningBundle\BackPlanningBundle(),
            new Back\ContractBundle\BackContractBundle(),
            new Back\DealBundle\BackDealBundle(),
            new User\UserBundle\UserUserBundle(),
            new Back\PartnerBundle\BackPartnerBundle(),
            new Back\CommandeBundle\BackCommandeBundle(),
            new Main\FrontBundle\MainFrontBundle(),
            new Main\BookingBundle\MainBookingBundle(),
            new Back\PageBundle\BackPageBundle(),
            new Main\RestBundle\MainRestBundle(),
            new Main\RatingclientBundle\MainRatingclientBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
