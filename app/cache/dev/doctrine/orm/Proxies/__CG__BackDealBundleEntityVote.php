<?php

namespace Proxies\__CG__\Back\DealBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Vote extends \Back\DealBundle\Entity\Vote implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', 'rating', 'voter', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'comment', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'act', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'dcr', 'value', 'createdAt');
        }

        return array('__isInitialized__', 'id', 'rating', 'voter', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'comment', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'act', '' . "\0" . 'Back\\DealBundle\\Entity\\Vote' . "\0" . 'dcr', 'value', 'createdAt');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Vote $proxy) {
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
    public function getRating()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRating', array());

        return parent::getRating();
    }

    /**
     * {@inheritDoc}
     */
    public function getVoter()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVoter', array());

        return parent::getVoter();
    }

    /**
     * {@inheritDoc}
     */
    public function setComment($comment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComment', array($comment));

        return parent::setComment($comment);
    }

    /**
     * {@inheritDoc}
     */
    public function getComment()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComment', array());

        return parent::getComment();
    }

    /**
     * {@inheritDoc}
     */
    public function setAct($act)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAct', array($act));

        return parent::setAct($act);
    }

    /**
     * {@inheritDoc}
     */
    public function getAct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAct', array());

        return parent::getAct();
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
    public function setValue($value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValue', array($value));

        return parent::setValue($value);
    }

    /**
     * {@inheritDoc}
     */
    public function getValue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValue', array());

        return parent::getValue();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRating(\DCS\RatingBundle\Model\RatingInterface $rating)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRating', array($rating));

        return parent::setRating($rating);
    }

    /**
     * {@inheritDoc}
     */
    public function setVoter(\Symfony\Component\Security\Core\User\UserInterface $voter)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVoter', array($voter));

        return parent::setVoter($voter);
    }

}
