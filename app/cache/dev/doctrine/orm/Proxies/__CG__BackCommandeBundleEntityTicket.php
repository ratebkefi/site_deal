<?php

namespace Proxies\__CG__\Back\CommandeBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Ticket extends \Back\CommandeBundle\Entity\Ticket implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'object', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'code', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'status', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'priorite', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'commande', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'user', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'message', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'dcr');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'object', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'code', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'status', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'priorite', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'commande', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'user', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'message', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Ticket' . "\0" . 'dcr');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Ticket $proxy) {
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
    public function setCommande(\Back\CommandeBundle\Entity\Command $commande = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCommande', array($commande));

        return parent::setCommande($commande);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommande()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommande', array());

        return parent::getCommande();
    }

    /**
     * {@inheritDoc}
     */
    public function setObject($object)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObject', array($object));

        return parent::setObject($object);
    }

    /**
     * {@inheritDoc}
     */
    public function getObject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObject', array());

        return parent::getObject();
    }

    /**
     * {@inheritDoc}
     */
    public function setCode($code)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCode', array($code));

        return parent::setCode($code);
    }

    /**
     * {@inheritDoc}
     */
    public function getCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCode', array());

        return parent::getCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setPriorite($priorite)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriorite', array($priorite));

        return parent::setPriorite($priorite);
    }

    /**
     * {@inheritDoc}
     */
    public function getPriorite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriorite', array());

        return parent::getPriorite();
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
    public function addMessage(\Back\CommandeBundle\Entity\TicketMessage $message)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMessage', array($message));

        return parent::addMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMessage(\Back\CommandeBundle\Entity\TicketMessage $message)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMessage', array($message));

        return parent::removeMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessage', array());

        return parent::getMessage();
    }

}