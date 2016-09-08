<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\OperationRepository")
 */
class Operation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean")
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_cheque", type="integer",nullable=true)
     */
    private $numCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="titulaire", type="string", length=255,nullable=true)
     */
    private $titulaire;
    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_encaissement", type="date",nullable=true)
     */
    private $dateEncaissement;
    /**
     * @ORM\ManyToOne(targetEntity="Command", inversedBy="operation")
     * @ORM\JoinColumn(name="commande_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $commande;


    /**
     * @ORM\ManyToOne(targetEntity="PaymentMethod", inversedBy="operation")
     * @ORM\JoinColumn(name="mode_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $modepayement;
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="operation")
     * @ORM\JoinColumn(name="resp_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="operation")
     * @ORM\JoinColumn(name="caisse_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $caisse;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="operation")
     * @ORM\JoinColumn(name="daf_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $daf;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dcr = new \DateTime();

    }    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param boolean $type
     * @return Operation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set numCheque
     *
     * @param integer $numCheque
     * @return Operation
     */
    public function setNumCheque($numCheque)
    {
        $this->numCheque = $numCheque;

        return $this;
    }

    /**
     * Get numCheque
     *
     * @return integer 
     */
    public function getNumCheque()
    {
        return $this->numCheque;
    }

    /**
     * Set titulaire
     *
     * @param string $titulaire
     * @return Operation
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get titulaire
     *
     * @return string 
     */
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return Operation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateEncaissement
     *
     * @param \DateTime $dateEncaissement
     * @return Operation
     */
    public function setDateEncaissement($dateEncaissement)
    {
        $this->dateEncaissement = $dateEncaissement;

        return $this;
    }

    /**
     * Get dateEncaissement
     *
     * @return \DateTime 
     */
    public function getDateEncaissement()
    {
        return $this->dateEncaissement;
    }

    /**
     * Set commande
     *
     * @param \Back\CommandeBundle\Entity\Command $commande
     * @return Operation
     */
    public function setCommande(\Back\CommandeBundle\Entity\Command $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Back\CommandeBundle\Entity\Command 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set modepayement
     *
     * @param \Back\CommandeBundle\Entity\PaymentMethod $modepayement
     * @return Operation
     */
    public function setModepayement(\Back\CommandeBundle\Entity\PaymentMethod $modepayement = null)
    {
        $this->modepayement = $modepayement;

        return $this;
    }

    /**
     * Get modepayement
     *
     * @return \Back\CommandeBundle\Entity\PaymentMethod 
     */
    public function getModepayement()
    {
        return $this->modepayement;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Operation
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set caisse
     *
     * @param \User\UserBundle\Entity\User $caisse
     * @return Operation
     */
    public function setCaisse(\User\UserBundle\Entity\User $caisse = null)
    {
        $this->caisse = $caisse;

        return $this;
    }

    /**
     * Get caisse
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getCaisse()
    {
        return $this->caisse;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Operation
     */
    public function setDcr($dcr)
    {
        $this->dcr = $dcr;

        return $this;
    }

    /**
     * Get dcr
     *
     * @return \DateTime 
     */
    public function getDcr()
    {
        return $this->dcr;
    }

    /**
     * Set daf
     *
     * @param \User\UserBundle\Entity\User $daf
     * @return Operation
     */
    public function setDaf(\User\UserBundle\Entity\User $daf = null)
    {
        $this->daf = $daf;

        return $this;
    }

    /**
     * Get daf
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getDaf()
    {
        return $this->daf;
    }
}
