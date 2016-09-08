<?php

namespace Proxies\__CG__\Back\ContractBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Reference extends \Back\ContractBundle\Entity\Reference implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'id', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'shopPrice', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'bigdealPrice', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'title', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'maxCoupon', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'returnedGoods', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'shipping', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'weight', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'length', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'description', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'width', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'height', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'price', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'annexe', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'command');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'id', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'shopPrice', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'bigdealPrice', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'title', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'maxCoupon', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'returnedGoods', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'shipping', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'weight', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'length', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'description', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'width', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'height', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'price', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'annexe', '' . "\0" . 'Back\\ContractBundle\\Entity\\Reference' . "\0" . 'command');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Reference $proxy) {
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
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
    public function setShopPrice($shopPrice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShopPrice', array($shopPrice));

        return parent::setShopPrice($shopPrice);
    }

    /**
     * {@inheritDoc}
     */
    public function getShopPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShopPrice', array());

        return parent::getShopPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setBigdealPrice($bigdealPrice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBigdealPrice', array($bigdealPrice));

        return parent::setBigdealPrice($bigdealPrice);
    }

    /**
     * {@inheritDoc}
     */
    public function getBigdealPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBigdealPrice', array());

        return parent::getBigdealPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxCoupon($maxCoupon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMaxCoupon', array($maxCoupon));

        return parent::setMaxCoupon($maxCoupon);
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxCoupon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMaxCoupon', array());

        return parent::getMaxCoupon();
    }

    /**
     * {@inheritDoc}
     */
    public function setReturnedGoods($returnedGoods)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReturnedGoods', array($returnedGoods));

        return parent::setReturnedGoods($returnedGoods);
    }

    /**
     * {@inheritDoc}
     */
    public function getReturnedGoods()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReturnedGoods', array());

        return parent::getReturnedGoods();
    }

    /**
     * {@inheritDoc}
     */
    public function setShipping($shipping)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShipping', array($shipping));

        return parent::setShipping($shipping);
    }

    /**
     * {@inheritDoc}
     */
    public function getShipping()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShipping', array());

        return parent::getShipping();
    }

    /**
     * {@inheritDoc}
     */
    public function setWeight($weight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWeight', array($weight));

        return parent::setWeight($weight);
    }

    /**
     * {@inheritDoc}
     */
    public function getWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWeight', array());

        return parent::getWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setLength($length)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLength', array($length));

        return parent::setLength($length);
    }

    /**
     * {@inheritDoc}
     */
    public function getLength()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLength', array());

        return parent::getLength();
    }

    /**
     * {@inheritDoc}
     */
    public function setWidth($width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWidth', array($width));

        return parent::setWidth($width);
    }

    /**
     * {@inheritDoc}
     */
    public function getWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWidth', array());

        return parent::getWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeight($height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeight', array($height));

        return parent::setHeight($height);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeight', array());

        return parent::getHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrice', array($price));

        return parent::setPrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrice', array());

        return parent::getPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setAnnexe(\Back\ContractBundle\Entity\Annexe $annexe = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAnnexe', array($annexe));

        return parent::setAnnexe($annexe);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnnexe()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnnexe', array());

        return parent::getAnnexe();
    }

    /**
     * {@inheritDoc}
     */
    public function addCommand(\Back\CommandeBundle\Entity\Command $command)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCommand', array($command));

        return parent::addCommand($command);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCommand(\Back\CommandeBundle\Entity\Command $command)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCommand', array($command));

        return parent::removeCommand($command);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommand()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCommand', array());

        return parent::getCommand();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

}
