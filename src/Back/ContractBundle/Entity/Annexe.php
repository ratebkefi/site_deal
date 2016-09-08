<?php

namespace Back\ContractBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annexe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\ContractBundle\Entity\AnnexeRepository")
 */
class Annexe
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
     * @ORM\Column(name="object", type="string", length=255,nullable=true)
     */
    private $object;

    /**
     * @var integer
     *
     * @ORM\Column(name="minCoupon", type="integer",nullable=false)
     */
    private $minCoupon;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrGratuite", type="integer",nullable=false)
     */
    private $nbrGratuite;

    /**
     * @var integer
     *
     * @ORM\Column(name="quota", type="integer",nullable=false)
     */
    private $quota;

    /**
     * @var boolean
     *
     * @ORM\Column(name="booking", type="boolean" ,nullable=true)
     */
    private $booking;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text",nullable=true)
     */
    private $remark;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vedio", type="boolean" ,nullable=true)
     */
    private $vedio;
    /**
     * @var boolean
     *
     * @ORM\Column(name="image", type="boolean" ,nullable=true)
     */
    private $image;

    /**
     * @var \Date
     * @ORM\Column(name="releaseDate", type="date",nullable=true)
     */
    private $releaseDate;
    /**
     * @var \Date
     * @ORM\Column(name="dcr", type="date",nullable=true)
     */
    private $dcr;
    /**
     * @var float
     *
     * @ORM\Column(name="fixedCommission", options={"default" = 0}, type="float",nullable=true)
     */
    private $fixedCommission;

    /**
     * @var float
     *
     * @ORM\Column(name="variableCommission", options={"default" = 0}, type="float",nullable=true)
     */
    private $variableCommission;

    /**
     * @ORM\ManyToOne(targetEntity="\Back\PlanningBundle\Entity\Planning", inversedBy="annexe")
     * @ORM\JoinColumn(name="planning_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    protected $planning;

    /**
     * @ORM\ManyToOne(targetEntity="Protocol", inversedBy="annexe")
     * @ORM\JoinColumn(name="protocol_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $protocol;

    /**
     * @ORM\OneToMany(targetEntity="Reference", mappedBy="annexe", cascade={"remove"})
     */
    protected $reference;

    /**
     * @ORM\ManyToOne(targetEntity="\User\UserBundle\Entity\User", inversedBy="annexe")
     * @ORM\JoinColumn(name="agent_id", referencedColumnName="id")
     */
    private $agent;
    /**
     * @ORM\OneToMany(targetEntity="Back\PlanningBundle\Entity\ResponseRequiredInfo", mappedBy="annexe")
     */
    protected $responserequiredinfo;

    /**
     * toString
     */
    public function __toString()
    {
        return $this->getProtocol()->getUser()->getName() . "  " . $this->object;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->minCoupon = 5;
        $this->dcr=new \DateTime();
        $this->fixedCommission = 0;
        $this->variableCommission = 0;
        $this->reference = new \Doctrine\Common\Collections\ArrayCollection();
        $this->responserequiredinfo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set object
     *
     * @param string $object
     * @return Annexe
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set minCoupon
     *
     * @param integer $minCoupon
     * @return Annexe
     */
    public function setMinCoupon($minCoupon)
    {
        $this->minCoupon = $minCoupon;

        return $this;
    }

    /**
     * Get minCoupon
     *
     * @return integer 
     */
    public function getMinCoupon()
    {
        return $this->minCoupon;
    }

    /**
     * Set nbrGratuite
     *
     * @param integer $nbrGratuite
     * @return Annexe
     */
    public function setNbrGratuite($nbrGratuite)
    {
        $this->nbrGratuite = $nbrGratuite;

        return $this;
    }

    /**
     * Get nbrGratuite
     *
     * @return integer 
     */
    public function getNbrGratuite()
    {
        return $this->nbrGratuite;
    }

    /**
     * Set quota
     *
     * @param integer $quota
     * @return Annexe
     */
    public function setQuota($quota)
    {
        $this->quota = $quota;

        return $this;
    }

    /**
     * Get quota
     *
     * @return integer 
     */
    public function getQuota()
    {
        return $this->quota;
    }

    /**
     * Set booking
     *
     * @param boolean $booking
     * @return Annexe
     */
    public function setBooking($booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Get booking
     *
     * @return boolean 
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Annexe
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Annexe
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set fixedCommission
     *
     * @param float $fixedCommission
     * @return Annexe
     */
    public function setFixedCommission($fixedCommission)
    {
        $this->fixedCommission = $fixedCommission;

        return $this;
    }

    /**
     * Get fixedCommission
     *
     * @return float 
     */
    public function getFixedCommission()
    {
        return $this->fixedCommission;
    }

    /**
     * Set variableCommission
     *
     * @param float $variableCommission
     * @return Annexe
     */
    public function setVariableCommission($variableCommission)
    {
        $this->variableCommission = $variableCommission;

        return $this;
    }

    /**
     * Get variableCommission
     *
     * @return float 
     */
    public function getVariableCommission()
    {
        return $this->variableCommission;
    }

    /**
     * Set planning
     *
     * @param \Back\PlanningBundle\Entity\Planning $planning
     * @return Annexe
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
     * Set protocol
     *
     * @param \Back\ContractBundle\Entity\Protocol $protocol
     * @return Annexe
     */
    public function setProtocol(\Back\ContractBundle\Entity\Protocol $protocol = null)
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get protocol
     *
     * @return \Back\ContractBundle\Entity\Protocol 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Add reference
     *
     * @param \Back\ContractBundle\Entity\Reference $reference
     * @return Annexe
     */
    public function addReference(\Back\ContractBundle\Entity\Reference $reference)
    {
        $this->reference[] = $reference;

        return $this;
    }

    /**
     * Remove reference
     *
     * @param \Back\ContractBundle\Entity\Reference $reference
     */
    public function removeReference(\Back\ContractBundle\Entity\Reference $reference)
    {
        $this->reference->removeElement($reference);
    }

    /**
     * Get reference
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set agent
     *
     * @param \User\UserBundle\Entity\User $agent
     * @return Annexe
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
     * Add responserequiredinfo
     *
     * @param \Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo
     * @return Annexe
     */
    public function addResponserequiredinfo(\Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo)
    {
        $this->responserequiredinfo[] = $responserequiredinfo;

        return $this;
    }

    /**
     * Remove responserequiredinfo
     *
     * @param \Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo
     */
    public function removeResponserequiredinfo(\Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo)
    {
        $this->responserequiredinfo->removeElement($responserequiredinfo);
    }

    /**
     * Get responserequiredinfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponserequiredinfo()
    {
        return $this->responserequiredinfo;
    }

    /**
     * Set vedio
     *
     * @param boolean $vedio
     * @return Annexe
     */
    public function setVedio($vedio)
    {
        $this->vedio = $vedio;

        return $this;
    }

    /**
     * Get vedio
     *
     * @return boolean 
     */
    public function getVedio()
    {
        return $this->vedio;
    }

    /**
     * Set image
     *
     * @param boolean $image
     * @return Annexe
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return boolean 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Annexe
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
}
