<?php

namespace Proxies\__CG__\Back\PartnerBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SellingPoint extends \Back\PartnerBundle\Entity\SellingPoint implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'id', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'name', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'adress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'latitude', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'longitude', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'phone', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'visible', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'visibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'latVisibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'lonVisibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'nbrEmployee', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'capacityPerHour', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'user', 'schedule', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'localite');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'id', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'name', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'adress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'latitude', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'longitude', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'phone', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'visible', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'visibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'latVisibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'lonVisibleAdress', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'nbrEmployee', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'capacityPerHour', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'user', 'schedule', '' . "\0" . 'Back\\PartnerBundle\\Entity\\SellingPoint' . "\0" . 'localite');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SellingPoint $proxy) {
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
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdress($adress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdress', array($adress));

        return parent::setAdress($adress);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdress', array());

        return parent::getAdress();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', array($latitude));

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', array());

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', array($longitude));

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', array());

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setVisible($visible)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisible', array($visible));

        return parent::setVisible($visible);
    }

    /**
     * {@inheritDoc}
     */
    public function getVisible()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVisible', array());

        return parent::getVisible();
    }

    /**
     * {@inheritDoc}
     */
    public function setVisibleAdress($visibleAdress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisibleAdress', array($visibleAdress));

        return parent::setVisibleAdress($visibleAdress);
    }

    /**
     * {@inheritDoc}
     */
    public function getVisibleAdress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVisibleAdress', array());

        return parent::getVisibleAdress();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatVisibleAdress($latVisibleAdress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatVisibleAdress', array($latVisibleAdress));

        return parent::setLatVisibleAdress($latVisibleAdress);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatVisibleAdress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatVisibleAdress', array());

        return parent::getLatVisibleAdress();
    }

    /**
     * {@inheritDoc}
     */
    public function setLonVisibleAdress($lonVisibleAdress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLonVisibleAdress', array($lonVisibleAdress));

        return parent::setLonVisibleAdress($lonVisibleAdress);
    }

    /**
     * {@inheritDoc}
     */
    public function getLonVisibleAdress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLonVisibleAdress', array());

        return parent::getLonVisibleAdress();
    }

    /**
     * {@inheritDoc}
     */
    public function setNbrEmployee($nbrEmployee)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNbrEmployee', array($nbrEmployee));

        return parent::setNbrEmployee($nbrEmployee);
    }

    /**
     * {@inheritDoc}
     */
    public function getNbrEmployee()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNbrEmployee', array());

        return parent::getNbrEmployee();
    }

    /**
     * {@inheritDoc}
     */
    public function setCapacityPerHour($capacityPerHour)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCapacityPerHour', array($capacityPerHour));

        return parent::setCapacityPerHour($capacityPerHour);
    }

    /**
     * {@inheritDoc}
     */
    public function getCapacityPerHour()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCapacityPerHour', array());

        return parent::getCapacityPerHour();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\User\UserBundle\Entity\User $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function addSchedule(\Back\PartnerBundle\Entity\Schedule $schedule)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSchedule', array($schedule));

        return parent::addSchedule($schedule);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSchedule(\Back\PartnerBundle\Entity\Schedule $schedule)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSchedule', array($schedule));

        return parent::removeSchedule($schedule);
    }

    /**
     * {@inheritDoc}
     */
    public function getSchedule()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchedule', array());

        return parent::getSchedule();
    }

    /**
     * {@inheritDoc}
     */
    public function setLocalite(\Back\CommandeBundle\Entity\Localite $localite = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocalite', array($localite));

        return parent::setLocalite($localite);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocalite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocalite', array());

        return parent::getLocalite();
    }

}
