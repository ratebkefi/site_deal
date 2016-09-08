<?php

namespace Back\DealBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DealBundle\Entity\DealRepository")
 */
class Deal {

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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="seo_title", type="string", length=255, nullable=true)
     */
    private $seoTitle;
    /**
     * @var string
     *
     * @ORM\Column(name="seo_description", type="string", length=255, nullable=true)
     */
    private $seoDescription;
    /**
     * @var string
     *
     * @ORM\Column(name="seo_link", type="string", length=255, nullable=true)
     */
    private $seoLink;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="bigdeallike", type="text", nullable=true)
     */
    private $bigdeallike;

    /**
     * @var string
     *
     * @ORM\Column(name="deal", type="text", nullable=true)
     */
    private $deal;

    /**
     * @var string
     *
     * @ORM\Column(name="youLike", type="text", nullable=true)
     */
    private $youLike;

    /**
     * @var string
     *
     * @ORM\Column(name="toBeClear", type="text", nullable=true)
     */
    private $toBeClear;
    /**
     * @var string
     *
     * @ORM\Column(name="strongpoint", type="text", nullable=true)
     */
    private $strongpoint;

    /**
     * @var \Date
     *
     * @ORM\Column(name="startDateValidtyCoupon", type="date", nullable=true)
     */
    private $startDateValidtyCoupon;

    /**
     * @var \Date
     *
     * @ORM\Column(name="endDateValidtyCoupon", type="date", nullable=true)
     */
    private $endDateValidtyCoupon;

    /**
     * @var string
     *
     * @ORM\Column(name="image1", type="string", length=255, nullable=true)
     */
    private $image1;

    /**
     * @var string
     *
     * @ORM\Column(name="image2", type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @var string
     *
     * @ORM\Column(name="image3", type="string", length=255, nullable=true)
     */
    private $image3;
	/**
     * @var string
     *
     * @ORM\Column(name="image4", type="string", length=255, nullable=true)
     */
    private $image4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cashPayment", type="boolean", nullable=true)
     */
    private $cashPayment;
    /**
     * @var boolean
     *
     * @ORM\Column(name="slider", type="boolean", nullable=true)
     */
    private $slider;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxCouponUser", type="integer", nullable=true)
     */
    private $maxCouponUser;

    /**
     * @ORM\OneToOne(targetEntity="Back\PlanningBundle\Entity\Planning", inversedBy="deal")
     * @ORM\JoinColumn(name="planning_id", referencedColumnName="id")
     * */
    private $planning;

    /**
     * @ORM\OneToMany(targetEntity="Back\CommandeBundle\Entity\Command", mappedBy="deal", cascade={"remove"})
     */
    private $command;
    /**
     * @ORM\OneToMany(targetEntity="Back\PartnerBundle\Entity\Invoice", mappedBy="deal", cascade={"remove"})

     */
    private $invoice;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="deal")
     * @ORM\JoinColumn(name="redacteur_id", referencedColumnName="id", nullable=true)
     * */
    private $redacteur;
    /**
     * @ORM\OneToMany(targetEntity="Dealhistory", mappedBy="deal", cascade={"remove"})
     */
    private $dealhistory;

    
    public function __toString(){
        return (string)$this->getTitle();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
		//$this->startDateValidtyCoupon  = $this->planning->getStartDate();
		//$this->endDateValidtyCoupon 	= $this->planning->getStartDate();
        $this->slider=false;
        $this->maxCouponUser =0;
        $this->cashPayment = true;
        $this->command = new \Doctrine\Common\Collections\ArrayCollection();
        $this->invoice = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dealhistory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Deal
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Deal
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set bigdeallike
     *
     * @param string $bigdeallike
     * @return Deal
     */
    public function setBigdeallike($bigdeallike)
    {
        $this->bigdeallike = $bigdeallike;

        return $this;
    }

    /**
     * Get bigdeallike
     *
     * @return string 
     */
    public function getBigdeallike()
    {
        return $this->bigdeallike;
    }

    /**
     * Set deal
     *
     * @param string $deal
     * @return Deal
     */
    public function setDeal($deal)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return string 
     */
    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Set youLike
     *
     * @param string $youLike
     * @return Deal
     */
    public function setYouLike($youLike)
    {
        $this->youLike = $youLike;

        return $this;
    }

    /**
     * Get youLike
     *
     * @return string 
     */
    public function getYouLike()
    {
        return $this->youLike;
    }

    /**
     * Set toBeClear
     *
     * @param string $toBeClear
     * @return Deal
     */
    public function setToBeClear($toBeClear)
    {
        $this->toBeClear = $toBeClear;

        return $this;
    }

    /**
     * Get toBeClear
     *
     * @return string 
     */
    public function getToBeClear()
    {
        return $this->toBeClear;
    }

    /**
     * Set strongpoint
     *
     * @param string $strongpoint
     * @return Deal
     */
    public function setStrongpoint($strongpoint)
    {
        $this->strongpoint = $strongpoint;

        return $this;
    }

    /**
     * Get strongpoint
     *
     * @return string 
     */
    public function getStrongpoint()
    {
        return $this->strongpoint;
    }



    /**
     * Set startDateValidtyCoupon
     *
     * @param \DateTime $startDateValidtyCoupon
     * @return Deal
     */
    public function setStartDateValidtyCoupon($startDateValidtyCoupon)
    {
        $this->startDateValidtyCoupon = $startDateValidtyCoupon;

        return $this;
    }

    /**
     * Get startDateValidtyCoupon
     *
     * @return \DateTime 
     */
    public function getStartDateValidtyCoupon()
    {
        return $this->startDateValidtyCoupon;
    }

    /**
     * Set endDateValidtyCoupon
     *
     * @param \DateTime $endDateValidtyCoupon
     * @return Deal
     */
    public function setEndDateValidtyCoupon($endDateValidtyCoupon)
    {
        $this->endDateValidtyCoupon = $endDateValidtyCoupon;

        return $this;
    }

    /**
     * Get endDateValidtyCoupon
     *
     * @return \DateTime 
     */
    public function getEndDateValidtyCoupon()
    {
        return $this->endDateValidtyCoupon;
    }

    /**
     * Set image1
     *
     * @param string $image1
     * @return Deal
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get image1
     *
     * @return string 
     */
    public function getImage1()
    {
        return $this->image1;
    }

	
	/**
     * Set image4
     *
     * @param string $image4
     * @return Deal
     */
    public function setImage4($image4)
    {
        $this->image4 = $image4;

        return $this;
    }

    /**
     * Get image4
     *
     * @return string 
     */
    public function getImage4()
    {
        return $this->image4;
    }
    /**
     * Set image2
     *
     * @param string $image2
     * @return Deal
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3
     *
     * @param string $image3
     * @return Deal
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string 
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * Set cashPayment
     *
     * @param boolean $cashPayment
     * @return Deal
     */
    public function setCashPayment($cashPayment)
    {
        $this->cashPayment = $cashPayment;

        return $this;
    }

    /**
     * Get cashPayment
     *
     * @return boolean 
     */
    public function getCashPayment()
    {
        return $this->cashPayment;
    }

    /**
     * Set maxCouponUser
     *
     * @param integer $maxCouponUser
     * @return Deal
     */
    public function setMaxCouponUser($maxCouponUser)
    {
        $this->maxCouponUser = $maxCouponUser;

        return $this;
    }

    /**
     * Get maxCouponUser
     *
     * @return integer 
     */
    public function getMaxCouponUser()
    {
        return $this->maxCouponUser;
    }

    /**
     * Set planning
     *
     * @param \Back\PlanningBundle\Entity\Planning $planning
     * @return Deal
     */
    public function setPlanning(\Back\PlanningBundle\Entity\Planning $planning = null)
    {
        $this->planning = $planning;

        return $this;
    }

    /**
     * Get planning
     *
     * @return \Back\PlanningBundle\Entity\Planning 
     */
    public function getPlanning()
    {
        return $this->planning;
    }

    /**
     * Add command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     * @return Deal
     */
    public function addCommand(\Back\CommandeBundle\Entity\Command $command)
    {
        $this->command[] = $command;

        return $this;
    }

    /**
     * Remove command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     */
    public function removeCommand(\Back\CommandeBundle\Entity\Command $command)
    {
        $this->command->removeElement($command);
    }

    /**
     * Get command
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Add invoice
     *
     * @param \Back\PartnerBundle\Entity\Invoice $invoice
     * @return Deal
     */
    public function addInvoice(\Back\PartnerBundle\Entity\Invoice $invoice)
    {
        $this->invoice[] = $invoice;

        return $this;
    }

    /**
     * Remove invoice
     *
     * @param \Back\PartnerBundle\Entity\Invoice $invoice
     */
    public function removeInvoice(\Back\PartnerBundle\Entity\Invoice $invoice)
    {
        $this->invoice->removeElement($invoice);
    }

    /**
     * Get invoice
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set redacteur
     *
     * @param \User\UserBundle\Entity\User $redacteur
     * @return Deal
     */
    public function setRedacteur(\User\UserBundle\Entity\User $redacteur = null)
    {
        $this->redacteur = $redacteur;

        return $this;
    }

    /**
     * Get redacteur
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getRedacteur()
    {
        return $this->redacteur;
    }

    /**
     * Set slider
     *
     * @param boolean $slider
     * @return Deal
     */
    public function setSlider($slider)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return boolean 
     */
    public function getSlider()
    {
        return $this->slider;
    }

    /**
     * Add dealhistory
     *
     * @param \Back\DealBundle\Entity\Dealhistory $dealhistory
     * @return Deal
     */
    public function addDealhistory(\Back\DealBundle\Entity\Dealhistory $dealhistory)
    {
        $this->dealhistory[] = $dealhistory;

        return $this;
    }

    /**
     * Remove dealhistory
     *
     * @param \Back\DealBundle\Entity\Dealhistory $dealhistory
     */
    public function removeDealhistory(\Back\DealBundle\Entity\Dealhistory $dealhistory)
    {
        $this->dealhistory->removeElement($dealhistory);
    }

    /**
     * Get dealhistory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDealhistory()
    {
        return $this->dealhistory;
    }

    /**
     * Set seoTitle
     *
     * @param string $seoTitle
     * @return Deal
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    /**
     * Get seoTitle
     *
     * @return string 
     */
    public function getSeoTitle()
    {
        return $this->seoTitle;
    }

    /**
     * Set seoDescription
     *
     * @param string $seoDescription
     * @return Deal
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * Get seoDescription
     *
     * @return string 
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * Set seoLink
     *
     * @param string $seoLink
     * @return Deal
     */
    public function setSeoLink($seoLink)
    {
        $this->seoLink = $seoLink;

        return $this;
    }

    /**
     * Get seoLink
     *
     * @return string 
     */
    public function getSeoLink()
    {
        return $this->seoLink;
    }
}
