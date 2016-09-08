<?php

namespace Proxies\__CG__\Back\CommandeBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Virement extends \Back\CommandeBundle\Entity\Virement implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = array('path' => NULL);



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {
        unset($this->path);

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * 
     * @param string $name
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', array($name));

            return $this->$name;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);
    }

    /**
     * 
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__set', array($name, $value));

            $this->$name = $value;

            return;
        }

        $this->$name = $value;
    }

    /**
     * 
     * @param  string $name
     * @return boolean
     */
    public function __isset($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__isset', array($name));

            return isset($this->$name);
        }

        return false;
    }

    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'montant', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'rib', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'etat', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'dcr', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'remarque', 'file', 'path', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'remboursement');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'montant', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'rib', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'etat', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'dcr', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'remarque', 'file', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Virement' . "\0" . 'remboursement');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Virement $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

            unset($this->path);
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
    public function upload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'upload', array());

        return parent::upload();
    }

    /**
     * {@inheritDoc}
     */
    public function getAbsolutePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAbsolutePath', array());

        return parent::getAbsolutePath();
    }

    /**
     * {@inheritDoc}
     */
    public function getWebPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebPath', array());

        return parent::getWebPath();
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
    public function setMontant($montant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMontant', array($montant));

        return parent::setMontant($montant);
    }

    /**
     * {@inheritDoc}
     */
    public function getMontant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMontant', array());

        return parent::getMontant();
    }

    /**
     * {@inheritDoc}
     */
    public function setRib($rib)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRib', array($rib));

        return parent::setRib($rib);
    }

    /**
     * {@inheritDoc}
     */
    public function getRib()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRib', array());

        return parent::getRib();
    }

    /**
     * {@inheritDoc}
     */
    public function setEtat($etat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEtat', array($etat));

        return parent::setEtat($etat);
    }

    /**
     * {@inheritDoc}
     */
    public function getEtat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEtat', array());

        return parent::getEtat();
    }

    /**
     * {@inheritDoc}
     */
    public function setRemarque($remarque)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRemarque', array($remarque));

        return parent::setRemarque($remarque);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemarque()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemarque', array());

        return parent::getRemarque();
    }

    /**
     * {@inheritDoc}
     */
    public function setPath($path)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPath', array($path));

        return parent::setPath($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPath', array());

        return parent::getPath();
    }

    /**
     * {@inheritDoc}
     */
    public function addRemboursement(\Back\CommandeBundle\Entity\Remboursement $remboursement)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRemboursement', array($remboursement));

        return parent::addRemboursement($remboursement);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRemboursement(\Back\CommandeBundle\Entity\Remboursement $remboursement)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRemboursement', array($remboursement));

        return parent::removeRemboursement($remboursement);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemboursement()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemboursement', array());

        return parent::getRemboursement();
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
    public function setDcra($dcra)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDcra', array($dcra));

        return parent::setDcra($dcra);
    }

    /**
     * {@inheritDoc}
     */
    public function getDcra()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDcra', array());

        return parent::getDcra();
    }

}
