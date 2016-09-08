<?php

namespace Back\ContractBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Reference
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\ContractBundle\Entity\ReferenceRepository")
 */
class Reference {

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
     * @ORM\Column(name="shopPrice", type="float")
     */
    private $shopPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="bigdealPrice", type="float")
     */
    private $bigdealPrice;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255,nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxCoupon", type="integer")
     */
    private $maxCoupon;

    /**
     * @var integer
     *
     * @ORM\Column(name="returnedGoods", type="integer")
     */
    private $returnedGoods;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shipping", type="boolean",nullable=true)
     */
    private $shipping;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float",nullable=true)
     */
    private $weight;

    /**
     * @var float
     *
     * @ORM\Column(name="length", type="float",nullable=true)
     */
    private $length;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var float
     *
     * @ORM\Column(name="width", type="float",nullable=true)
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="height", type="float",nullable=true)
     */
    private $height;
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float",nullable=true)
     */
    private $price;
    /**
     * @ORM\ManyToOne(targetEntity="Annexe", inversedBy="reference")
     * @ORM\JoinColumn(name="annexe_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $annexe;
    /**
     * @ORM\OneToMany(targetEntity="Back\CommandeBundle\Entity\Command", mappedBy="reference", cascade={"remove"})
     */
    private $command;

    /**
     * toString
     */
    public function __toString(){
        return $this->getTitle();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->maxCoupon = 0;
        $this->returnedGoods=0;
        $this->command = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set shopPrice
     *
     * @param float $shopPrice
     * @return Reference
     */
    public function setShopPrice($shopPrice)
    {
        $this->shopPrice = $shopPrice;

        return $this;
    }

    /**
     * Get shopPrice
     *
     * @return float 
     */
    public function getShopPrice()
    {
        return $this->shopPrice;
    }

    /**
     * Set bigdealPrice
     *
     * @param float $bigdealPrice
     * @return Reference
     */
    public function setBigdealPrice($bigdealPrice)
    {
        $this->bigdealPrice = $bigdealPrice;

        return $this;
    }

    /**
     * Get bigdealPrice
     *
     * @return float 
     */
    public function getBigdealPrice()
    {
        return $this->bigdealPrice;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Reference
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
     * Set maxCoupon
     *
     * @param integer $maxCoupon
     * @return Reference
     */
    public function setMaxCoupon($maxCoupon)
    {
        $this->maxCoupon = $maxCoupon;

        return $this;
    }

    /**
     * Get maxCoupon
     *
     * @return integer 
     */
    public function getMaxCoupon()
    {
        return $this->maxCoupon;
    }

    /**
     * Set returnedGoods
     *
     * @param integer $returnedGoods
     * @return Reference
     */
    public function setReturnedGoods($returnedGoods)
    {
        $this->returnedGoods = $returnedGoods;

        return $this;
    }

    /**
     * Get returnedGoods
     *
     * @return integer 
     */
    public function getReturnedGoods()
    {
        return $this->returnedGoods;
    }

    /**
     * Set shipping
     *
     * @param boolean $shipping
     * @return Reference
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get shipping
     *
     * @return boolean 
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return Reference
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param float $length
     * @return Reference
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return float 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param float $width
     * @return Reference
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return Reference
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Reference
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set annexe
     *
     * @param \Back\ContractBundle\Entity\Annexe $annexe
     * @return Reference
     */
    public function setAnnexe(\Back\ContractBundle\Entity\Annexe $annexe = null)
    {
        $this->annexe = $annexe;

        return $this;
    }

    /**
     * Get annexe
     *
     * @return \Back\ContractBundle\Entity\Annexe 
     */
    public function getAnnexe()
    {
        return $this->annexe;
    }

    /**
     * Add command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     * @return Reference
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
     * Set description
     *
     * @param string $description
     * @return Reference
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
}
