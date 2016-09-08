<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DashBundle\Entity\RegleRepository")
 */
class Regle
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starDate", type="date")
     */
    private $starDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date")
     */
    private $endDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="act", type="boolean", nullable=true)
     */
    private $act;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Regle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set starDate
     *
     * @param \DateTime $starDate
     * @return Regle
     */
    public function setStarDate($starDate)
    {
        $this->starDate = $starDate;

        return $this;
    }

    /**
     * Get starDate
     *
     * @return \DateTime 
     */
    public function getStarDate()
    {
        return $this->starDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Regle
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set act
     *
     * @param boolean $act
     * @return Regle
     */
    public function setAct($act)
    {
        $this->act = $act;

        return $this;
    }

    /**
     * Get act
     *
     * @return boolean 
     */
    public function getAct()
    {
        return $this->act;
    }
}
