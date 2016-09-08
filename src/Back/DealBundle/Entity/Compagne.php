<?php

namespace Back\DealBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compagne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DealBundle\Entity\CompagneRepository")
 */
class Compagne
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
     * @ORM\ManyToOne(targetEntity="Back\DealBundle\Entity\Deal")
     */
    private $dealcompagne;

    /**
     * @ORM\ManyToMany(targetEntity="Back\DealBundle\Entity\Deal")
     */
    private $dealfeatued;

    /**
     * @var string
     *
     * @ORM\Column(name="namecompagne", type="string", length=255)
     */
    private $namecompagne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreated", type="datetime")
     */
    private $datecreated;

    /**
     * @var string
     *
     * @ORM\Column(name="createdby", type="string", length=255)
     */
    private $createdby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateupdated", type="datetime")
     */
    private $dateupdated;

    /**
     * @var string
     *
     * @ORM\Column(name="updatedby", type="string", length=255)
     */
    private $updatedby;


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
     * Constructor
     */
    public function __construct()
    {
        $this->dealfeatued = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set namecompagne
     *
     * @param string $namecompagne
     * @return Compagne
     */
    public function setNamecompagne($namecompagne)
    {
        $this->namecompagne = $namecompagne;

        return $this;
    }

    /**
     * Get namecompagne
     *
     * @return string 
     */
    public function getNamecompagne()
    {
        return $this->namecompagne;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     * @return Compagne
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime 
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set createdby
     *
     * @param string $createdby
     * @return Compagne
     */
    public function setCreatedby($createdby)
    {
        $this->createdby = $createdby;

        return $this;
    }

    /**
     * Get createdby
     *
     * @return string 
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set dateupdated
     *
     * @param \DateTime $dateupdated
     * @return Compagne
     */
    public function setDateupdated($dateupdated)
    {
        $this->dateupdated = $dateupdated;

        return $this;
    }

    /**
     * Get dateupdated
     *
     * @return \DateTime 
     */
    public function getDateupdated()
    {
        return $this->dateupdated;
    }

    /**
     * Set updatedby
     *
     * @param string $updatedby
     * @return Compagne
     */
    public function setUpdatedby($updatedby)
    {
        $this->updatedby = $updatedby;

        return $this;
    }

    /**
     * Get updatedby
     *
     * @return string 
     */
    public function getUpdatedby()
    {
        return $this->updatedby;
    }

    /**
     * Set dealcompagne
     *
     * @param \Back\DealBundle\Entity\Deal $dealcompagne
     * @return Compagne
     */
    public function setDealcompagne(\Back\DealBundle\Entity\Deal $dealcompagne = null)
    {
        $this->dealcompagne = $dealcompagne;

        return $this;
    }

    /**
     * Get dealcompagne
     *
     * @return \Back\DealBundle\Entity\Deal 
     */
    public function getDealcompagne()
    {
        return $this->dealcompagne;
    }

    /**
     * Add dealfeatued
     *
     * @param \Back\DealBundle\Entity\Deal $dealfeatued
     * @return Compagne
     */
    public function addDealfeatued(\Back\DealBundle\Entity\Deal $dealfeatued)
    {
        $this->dealfeatued[] = $dealfeatued;

        return $this;
    }

    /**
     * Remove dealfeatued
     *
     * @param \Back\DealBundle\Entity\Deal $dealfeatued
     */
    public function removeDealfeatued(\Back\DealBundle\Entity\Deal $dealfeatued)
    {
        $this->dealfeatued->removeElement($dealfeatued);
    }

    /**
     * Get dealfeatued
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDealfeatued()
    {
        return $this->dealfeatued;
    }
}
