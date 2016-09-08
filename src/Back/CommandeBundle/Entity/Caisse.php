<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caisse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\CaisseRepository")
 */
class Caisse
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="datetime")
     */
    private $dateUpdate;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_espece", type="float")
     */
    private $montantEspece;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_cheque", type="float")
     */
    private $montantCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;
    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;
    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;
    /**
     * @var string
     *
     * @ORM\Column(name="horaire", type="string", length=255, nullable=true)
     */
    private $horaire;
    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;
    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="caisse", cascade={"remove"})
     */
    private $operation;
    /**
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="caisse")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;
    /**
     * @ORM\OneToMany(targetEntity="Command", mappedBy="caisse", cascade={"remove"})
     */
    private $commande;
    /**
     * @var boolean
     *
     * @ORM\Column(name="afficher", type="boolean", nullable=true)
     */
    private $afficher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commande = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Caisse
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set montantEspece
     *
     * @param float $montantEspece
     * @return Caisse
     */
    public function setMontantEspece($montantEspece)
    {
        $this->montantEspece = $montantEspece;

        return $this;
    }

    /**
     * Get montantEspece
     *
     * @return float 
     */
    public function getMontantEspece()
    {
        return $this->montantEspece;
    }

    /**
     * Set montantCheque
     *
     * @param float $montantCheque
     * @return Caisse
     */
    public function setMontantCheque($montantCheque)
    {
        $this->montantCheque = $montantCheque;

        return $this;
    }

    /**
     * Get montantCheque
     *
     * @return float 
     */
    public function getMontantCheque()
    {
        return $this->montantCheque;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Caisse
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
     * Add operation
     *
     * @param \Back\CommandeBundle\Entity\Operation $operation
     * @return Caisse
     */
    public function addOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {
        $this->operation[] = $operation;

        return $this;
    }

    /**
     * Remove operation
     *
     * @param \Back\CommandeBundle\Entity\Operation $operation
     */
    public function removeOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {
        $this->operation->removeElement($operation);
    }

    /**
     * Get operation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Caisse
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
     * Add commande
     *
     * @param \Back\CommandeBundle\Entity\Command $commande
     * @return Caisse
     */
    public function addCommande(\Back\CommandeBundle\Entity\Command $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Back\CommandeBundle\Entity\Command $commande
     */
    public function removeCommande(\Back\CommandeBundle\Entity\Command $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    public function __toString(){
        return $this->libelle." ";
    }


    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Caisse
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Caisse
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Caisse
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
     * Set horaire
     *
     * @param string $horaire
     * @return Caisse
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return string 
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Caisse
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
     * Set afficher
     *
     * @param boolean $afficher
     * @return Caisse
     */
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    /**
     * Get afficher
     *
     * @return boolean 
     */
    public function getAfficher()
    {
        return $this->afficher;
    }
}
