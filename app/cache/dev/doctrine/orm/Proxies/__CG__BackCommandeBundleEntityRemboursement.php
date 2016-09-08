<?php

namespace Proxies\__CG__\Back\CommandeBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Remboursement extends \Back\CommandeBundle\Entity\Remboursement implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'dcr', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'coupon', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'ticket', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'historique', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'virement');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'dcr', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'coupon', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'ticket', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'historique', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Remboursement' . "\0" . 'virement');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Remboursement $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setDcr($dcr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDcr', array($dcr));

        return parent::setDcr($dcr);
    }

    /**
     * {@inheritDoc}
     */
    public function getDcr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDcr', array());

        return parent::getDcr();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoupon(\Back\CommandeBundle\Entity\Coupon $coupon = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoupon', array($coupon));

        return parent::setCoupon($coupon);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoupon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoupon', array());

        return parent::getCoupon();
    }

    /**
     * {@inheritDoc}
     */
    public function setHistorique(\Back\DashBundle\Entity\BigFidHistorique $historique = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHistorique', array($historique));

        return parent::setHistorique($historique);
    }

    /**
     * {@inheritDoc}
     */
    public function getHistorique()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHistorique', array());

        return parent::getHistorique();
    }

    /**
     * {@inheritDoc}
     */
    public function setVirement(\Back\CommandeBundle\Entity\Virement $virement = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVirement', array($virement));

        return parent::setVirement($virement);
    }

    /**
     * {@inheritDoc}
     */
    public function getVirement()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVirement', array());

        return parent::getVirement();
    }

    /**
     * {@inheritDoc}
     */
    public function setTicket(\Back\CommandeBundle\Entity\Ticket $ticket = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTicket', array($ticket));

        return parent::setTicket($ticket);
    }

    /**
     * {@inheritDoc}
     */
    public function getTicket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTicket', array());

        return parent::getTicket();
    }

}