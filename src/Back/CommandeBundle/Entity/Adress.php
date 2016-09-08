<?php

namespace Back\CommandeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adress
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\AdressRepository")
 */
class Adress
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
     * @ORM\Column(name="adress", type="text")
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="indcation", type="text",nullable=true)
     */
    private $indcation;
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="Adress")
     * @ORM\JoinColumn(name="clientid_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="Localite", inversedBy="Adress")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $localite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="stat", type="boolean")
     */
    private $stat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stat = false;
    }




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
     return $this->getAdress() ." " .$this->getIndcation();
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set indcation
     *
     * @param string $indcation
     * @return Adress
     */
    public function setIndcation($indcation)
    {
        $this->indcation = $indcation;

        return $this;
    }

    /**
     * Get indcation
     *
     * @return string
     */
    public function getIndcation()
    {
        return $this->indcation;
    }


    /**
     * Set client
     *
     * @param \Back\CommandeBundle\Entity\Client $client
     * @return Adress
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
     * Set localite
     *
     * @param \Back\CommandeBundle\Entity\Localite $localite
     * @return Adress
     */
    public function setLocalite(\Back\CommandeBundle\Entity\Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \Back\CommandeBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }
    /**
     * Set stat
     *
     * @param boolean $stat
     * @return Client
     */
    public function setStat($stat)
    {
        $this->stat = $stat;

        return $this;
    }

    /**
     * Get stat
     *
     * @return boolean
     */
    public function getStat()
    {
        return $this->stat;
    }
}
