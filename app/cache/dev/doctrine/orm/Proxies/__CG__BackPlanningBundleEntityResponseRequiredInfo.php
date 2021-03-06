<?php

namespace Proxies\__CG__\Back\PlanningBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ResponseRequiredInfo extends \Back\PlanningBundle\Entity\ResponseRequiredInfo implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'id', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'response', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'requiredInfoId', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'requiredInfo', 'annexe');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'id', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'response', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'requiredInfoId', '' . "\0" . 'Back\\PlanningBundle\\Entity\\ResponseRequiredInfo' . "\0" . 'requiredInfo', 'annexe');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ResponseRequiredInfo $proxy) {
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
    public function setResponse($response)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResponse', array($response));

        return parent::setResponse($response);
    }

    /**
     * {@inheritDoc}
     */
    public function getResponse()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResponse', array());

        return parent::getResponse();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequiredInfoId(\Back\PlanningBundle\Entity\requiredInfo $requiredInfoId = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequiredInfoId', array($requiredInfoId));

        return parent::setRequiredInfoId($requiredInfoId);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredInfoId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequiredInfoId', array());

        return parent::getRequiredInfoId();
    }

    /**
     * {@inheritDoc}
     */
    public function addRequiredInfo(\Back\PlanningBundle\Entity\requiredInfo $requiredInfo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRequiredInfo', array($requiredInfo));

        return parent::addRequiredInfo($requiredInfo);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRequiredInfo(\Back\PlanningBundle\Entity\requiredInfo $requiredInfo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRequiredInfo', array($requiredInfo));

        return parent::removeRequiredInfo($requiredInfo);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredInfo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequiredInfo', array());

        return parent::getRequiredInfo();
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

}
