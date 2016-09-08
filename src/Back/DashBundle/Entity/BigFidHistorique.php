<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BigFidHistorique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DashBundle\Entity\BigFidHistoriqueRepository")
 */
class BigFidHistorique
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
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Client", inversedBy="bigfidhistorique")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $client;
    /**
     * @var integer
     *
     * @ORM\Column(name="operation", type="integer", length=255)
     */
    private $operation;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set montant
     *
     * @param float $montant
     * @return BigFidHistorique
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
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return BigFidHistorique
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
     * Set motif
     *
     * @param string $motif
     * @return BigFidHistorique
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set client
     *
     * @param \Back\CommandeBundle\Entity\Client $client
     * @return BigFidHistorique
     */
    public function setClient(\Back\CommandeBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Back\CommandeBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set parent
     *
     * @param \Back\DashBundle\Entity\BigFidHistorique $parent
     * @return BigFidHistorique
     */
    public function setParent(\Back\DashBundle\Entity\BigFidHistorique $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Back\DashBundle\Entity\BigFidHistorique 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set operation
     *
     * @param integer $operation
     * @return BigFidHistorique
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Get operation
     *
     * @return integer 
     */
    public function getOperation()
    {
        return $this->operation;
    }
}
