<?php

namespace Back\PartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
/**
 * Invoice
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PartnerBundle\Entity\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="numfacture", type="string", length=255)
     */
    private $numfacture;    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_virement", type="datetime",nullable=true)
     */
    private $dvir;
    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;
    /**
     * @var integer
     *
     * @ORM\Column(name="payement", type="integer",nullable=true)
     */
    private $payement;

    /**
     * @var float
     *
     * @ORM\Column(name="ca", type="float")
     */
    private $ca;

    /**
     * @var float
     *
     * @ORM\Column(name="com_fixe", type="float")
     */
    private $comFixe;

    /**
     * @var float
     *
     * @ORM\Column(name="com_variable", type="float")
     */
    private $comVariable;

    /**
     * @var float
     *
     * @ORM\Column(name="virement", type="float")
     */
    private $virement;

    /**
     * @ORM\OneToMany(targetEntity="Back\CommandeBundle\Entity\Coupon", mappedBy="invoice", cascade={"remove"})
     */
    protected $coupon;


    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="Invoice")
     * @ORM\JoinColumn(name="partner_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $user;

   
    /**
     * @ORM\ManyToOne(targetEntity="Back\DealBundle\Entity\Deal", inversedBy="Invoice")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $deal;
    /**
     * @ORM\ManyToOne(targetEntity="\User\UserBundle\Entity\User", inversedBy="planning")
     * @ORM\JoinColumn(name="agent_id", referencedColumnName="id")
     */
    private $agent;
    /**
     * @Assert\File(maxSize="2048k")
     *     mimeTypes = {"image/jpg", "image/jpeg", "image/gif", "image/png","application/pdf", "application/x-pdf","application/msword"},
     *     mimeTypesMessage = "Les fichier  doivent être au format Images, PDF ou Word."
     */
    public   $file;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $tab=explode(".",$this->file->getClientOriginalName());
        $tab=array_reverse($tab);
        $filename=((time($tab)*9851)+rand(500,98765412)).".".$tab[0];

        $this->file->move($this->getUploadRootDir(), $filename);

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $filename;

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/facture';
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
     * Set numfacture
     *
     * @param string $numfacture
     * @return Schedule
     */
    public function setNumfacture($num)
    {
        $this->numfacture = $num;

        return $this;
    }

    /**
     * Get numfacture
     *
     * @return string 
     */
    public function getNumfacture()
    {
        return $this->numfacture;
    }
    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Invoice
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
     * Set etat
     *
     * @param integer $etat
     * @return Invoice
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set ca
     *
     * @param float $ca
     * @return Invoice
     */
    public function setCa($ca)
    {
        $this->ca = $ca;

        return $this;
    }

    /**
     * Get ca
     *
     * @return float 
     */
    public function getCa()
    {
        return $this->ca;
    }

    /**
     * Set comFixe
     *
     * @param integer $comFixe
     * @return Invoice
     */
    public function setComFixe($comFixe)
    {
        $this->comFixe = $comFixe;

        return $this;
    }

    /**
     * Get comFixe
     *
     * @return integer 
     */
    public function getComFixe()
    {
        return $this->comFixe;
    }

    /**
     * Set comVariable
     *
     * @param float $comVariable
     * @return Invoice
     */
    public function setComVariable($comVariable)
    {
        $this->comVariable = $comVariable;

        return $this;
    }

    /**
     * Get comVariable
     *
     * @return float 
     */
    public function getComVariable()
    {
        return $this->comVariable;
    }

    /**
     * Set virement
     *
     * @param float $virement
     * @return Invoice
     */
    public function setVirement($virement)
    {
        $this->virement = $virement;

        return $this;
    }

    /**
     * Get virement
     *
     * @return float 
     */
    public function getVirement()
    {
        return $this->virement;
    }

    /**
     * Set coupon
     *
     * @param \Back\CommandeBundle\Entity\Coupon $coupon
     * @return Invoice
     */
    public function setCoupon(\Back\CommandeBundle\Entity\Coupon $coupon = null)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get coupon
     *
     * @return \Back\CommandeBundle\Entity\Coupon 
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Invoice
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
     * Set deal
     *
     * @param \Back\DealBundle\Entity\Deal $deal
     * @return Invoice
     */
    public function setDeal(\Back\DealBundle\Entity\Deal $deal = null)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \Back\DealBundle\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }
    /**
     * Constructor
     */
    public function __construct($user = null)
    {
        $this->agent = $user;
        $this->coupon = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add coupon
     *
     * @param \Back\CommandeBundle\Entity\Coupon $coupon
     * @return Invoice
     */
    public function addCoupon(\Back\CommandeBundle\Entity\Coupon $coupon)
    {
        $this->coupon[] = $coupon;

        return $this;
    }

    /**
     * Remove coupon
     *
     * @param \Back\CommandeBundle\Entity\Coupon $coupon
     */
    public function removeCoupon(\Back\CommandeBundle\Entity\Coupon $coupon)
    {
        $this->coupon->removeElement($coupon);
    }

    
    /**
     * Set agent
     *
     * @param \User\UserBundle\Entity\User $agent
     * @return Invoice
     */
    public function setAgent(\User\UserBundle\Entity\User $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set dvir
     *
     * @param \DateTime $dvir
     * @return Invoice
     */
    public function setDvir($dvir)
    {
        $this->dvir = $dvir;

        return $this;
    }

    /**
     * Get dvir
     *
     * @return \DateTime 
     */
    public function getDvir()
    {
        return $this->dvir;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Invoice
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set payement
     *
     * @param integer $payement
     * @return Invoice
     */
    public function setPayement($payement)
    {
        $this->payement = $payement;

        return $this;
    }

    /**
     * Get payement
     *
     * @return integer 
     */
    public function getPayement()
    {
        return $this->payement;
    }
}
