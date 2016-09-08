<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Entreprise
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;
    /**
     * @var string
     *
     * @ORM\Column(name="gerant", type="string", length=255, nullable=true)
     */
    private $gerant;
    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=8, nullable=true)
     */
    private $tel;
    /**
     * @var string
     *
     * @ORM\Column(name="mf", type="string", length=50, nullable=true)
     */
    private $mf;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Back\ContractBundle\Entity\Protocol", mappedBy="Entreprise", cascade={"remove"})
     */
    protected $protocol;
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
     * @return Entreprise
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
    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set gerant
     *
     * @param string $gerant
     * @return Entreprise
     */
    public function setGerant($gerant)
    {
        $this->gerant = $gerant;

        return $this;
    }

    /**
     * Get gerant
     *
     * @return string 
     */
    public function getGerant()
    {
        return $this->gerant;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Entreprise
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mf
     *
     * @param string $mf
     * @return Entreprise
     */
    public function setMf($mf)
    {
        $this->mf = $mf;

        return $this;
    }

    /**
     * Get mf
     *
     * @return string 
     */
    public function getMf()
    {
        return $this->mf;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Entreprise
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->protocol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add protocol
     *
     * @param \Back\ContractBundle\Entity\Protocol $protocol
     * @return Entreprise
     */
    public function addProtocol(\Back\ContractBundle\Entity\Protocol $protocol)
    {
        $this->protocol[] = $protocol;

        return $this;
    }

    /**
     * Remove protocol
     *
     * @param \Back\ContractBundle\Entity\Protocol $protocol
     */
    public function removeProtocol(\Back\ContractBundle\Entity\Protocol $protocol)
    {
        $this->protocol->removeElement($protocol);
    }

    /**
     * Get protocol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }
}
