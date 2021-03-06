<?php

namespace Proxies\__CG__\Back\CommandeBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Caisse extends \Back\CommandeBundle\Entity\Caisse implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'dateUpdate', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'montantEspece', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'montantCheque', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'libelle', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'latitude', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'longitude', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'adresse', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'horaire', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'tel', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'operation', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'user', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'commande', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'afficher');
        }

        return array('__isInitialized__', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'id', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'dateUpdate', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'montantEspece', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'montantCheque', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'libelle', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'latitude', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'longitude', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'adresse', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'horaire', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'tel', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'operation', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'user', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'commande', '' . "\0" . 'Back\\CommandeBundle\\Entity\\Caisse' . "\0" . 'afficher');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Caisse $proxy) {
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
    public function setDateUpdate($dateUpdate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateUpdate', array($dateUpdate));

        return parent::setDateUpdate($dateUpdate);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateUpdate', array());

        return parent::getDateUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function setMontantEspece($montantEspece)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMontantEspece', array($montantEspece));

        return parent::setMontantEspece($montantEspece);
    }

    /**
     * {@inheritDoc}
     */
    public function getMontantEspece()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMontantEspece', array());

        return parent::getMontantEspece();
    }

    /**
     * {@inheritDoc}
     */
    public function setMontantCheque($montantCheque)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMontantCheque', array($montantCheque));

        return parent::setMontantCheque($montantCheque);
    }

    /**
     * {@inheritDoc}
     */
    public function getMontantCheque()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMontantCheque', array());

        return parent::getMontantCheque();
    }

    /**
     * {@inheritDoc}
     */
    public function setLibelle($libelle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLibelle', array($libelle));

        return parent::setLibelle($libelle);
    }

    /**
     * {@inheritDoc}
     */
    public function getLibelle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLibelle', array());

        return parent::getLibelle();
    }

    /**
     * {@inheritDoc}
     */
    public function addOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOperation', array($operation));

        return parent::addOperation($operation);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOperation', array($operation));

        return parent::removeOperation($operation);
    }

    /**
     * {@inheritDoc}
     */
    public function getOperation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOperation', array());

        return parent::getOperation();
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
    public function addCommande(\Back\CommandeBundle\Entity\Command $commande)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCommande', array($commande));

        return parent::addCommande($commande);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCommande(\Back\CommandeBundle\Entity\Command $commande)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCommande', array($commande));

        return parent::removeCommande($commande);
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
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
    public function setAdresse($adresse)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresse', array($adresse));

        return parent::setAdresse($adresse);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresse()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresse', array());

        return parent::getAdresse();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoraire($horaire)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoraire', array($horaire));

        return parent::setHoraire($horaire);
    }

    /**
     * {@inheritDoc}
     */
    public function getHoraire()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoraire', array());

        return parent::getHoraire();
    }

    /**
     * {@inheritDoc}
     */
    public function setTel($tel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel', array($tel));

        return parent::setTel($tel);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel', array());

        return parent::getTel();
    }

    /**
     * {@inheritDoc}
     */
    public function setAfficher($afficher)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAfficher', array($afficher));

        return parent::setAfficher($afficher);
    }

    /**
     * {@inheritDoc}
     */
    public function getAfficher()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAfficher', array());

        return parent::getAfficher();
    }

}
