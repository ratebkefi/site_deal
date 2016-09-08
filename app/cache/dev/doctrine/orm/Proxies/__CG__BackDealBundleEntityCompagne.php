<?php

namespace Proxies\__CG__\Back\DealBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Compagne extends \Back\DealBundle\Entity\Compagne implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'id', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dealcompagne', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dealfeatued', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'namecompagne', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'datecreated', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'createdby', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dateupdated', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'updatedby');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'id', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dealcompagne', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dealfeatued', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'namecompagne', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'datecreated', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'createdby', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'dateupdated', '' . "\0" . 'Back\\DealBundle\\Entity\\Compagne' . "\0" . 'updatedby');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Compagne $proxy) {
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
    public function setNamecompagne($namecompagne)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNamecompagne', array($namecompagne));

        return parent::setNamecompagne($namecompagne);
    }

    /**
     * {@inheritDoc}
     */
    public function getNamecompagne()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNamecompagne', array());

        return parent::getNamecompagne();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatecreated($datecreated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatecreated', array($datecreated));

        return parent::setDatecreated($datecreated);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatecreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatecreated', array());

        return parent::getDatecreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedby($createdby)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedby', array($createdby));

        return parent::setCreatedby($createdby);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedby()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedby', array());

        return parent::getCreatedby();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateupdated($dateupdated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateupdated', array($dateupdated));

        return parent::setDateupdated($dateupdated);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateupdated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateupdated', array());

        return parent::getDateupdated();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedby($updatedby)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedby', array($updatedby));

        return parent::setUpdatedby($updatedby);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedby()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedby', array());

        return parent::getUpdatedby();
    }

    /**
     * {@inheritDoc}
     */
    public function setDealcompagne(\Back\DealBundle\Entity\Deal $dealcompagne = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDealcompagne', array($dealcompagne));

        return parent::setDealcompagne($dealcompagne);
    }

    /**
     * {@inheritDoc}
     */
    public function getDealcompagne()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDealcompagne', array());

        return parent::getDealcompagne();
    }

    /**
     * {@inheritDoc}
     */
    public function addDealfeatued(\Back\DealBundle\Entity\Deal $dealfeatued)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDealfeatued', array($dealfeatued));

        return parent::addDealfeatued($dealfeatued);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDealfeatued(\Back\DealBundle\Entity\Deal $dealfeatued)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDealfeatued', array($dealfeatued));

        return parent::removeDealfeatued($dealfeatued);
    }

    /**
     * {@inheritDoc}
     */
    public function getDealfeatued()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDealfeatued', array());

        return parent::getDealfeatued();
    }

}
