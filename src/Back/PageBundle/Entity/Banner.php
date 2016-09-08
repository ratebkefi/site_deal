<?php

namespace Back\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PageBundle\Entity\BannerRepository")
 */
class Banner
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
     * @ORM\Column(name="name", type="string", length=255,nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text",nullable=true)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="date")
     */
    private $dcr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="date")
     */
    private $dated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datef", type="date")
     */
    private $datef;

    /**
     * @var boolean
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="text",nullable=true)
     */
    private $media;
    /**
     * @var integer
     *
     * @ORM\Column(name="zone", type="integer")
     */
    private $zone;
    /**
     * @var integer
     *
     * @ORM\Column(name="target", type="integer")
     */
    private $target;
    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;
    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;
    /**
     * Construct
     */
    public function __construct(){
        $this->dcr=new \DateTime();
        $this->act=false;
        $this->zone=1;
        $this->target=0;
        $this->height=0;
        $this->width=0;
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
     * Set name
     *
     * @param string $name
     * @return Banner
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Banner
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Banner
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
     * Set dated
     *
     * @param \DateTime $dated
     * @return Banner
     */
    public function setDated($dated)
    {
        $this->dated = $dated;

        return $this;
    }

    /**
     * Get dated
     *
     * @return \DateTime 
     */
    public function getDated()
    {
        return $this->dated;
    }

    /**
     * Set datef
     *
     * @param \DateTime $datef
     * @return Banner
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;

        return $this;
    }

    /**
     * Get datef
     *
     * @return \DateTime 
     */
    public function getDatef()
    {
        return $this->datef;
    }

    /**
     * Set act
     *
     * @param boolean $act
     * @return Banner
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

    /**
     * Set media
     *
     * @param string $media
     * @return Banner
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set zone
     *
     * @param integer $zone
     * @return Banner
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return integer 
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set target
     *
     * @param integer $target
     * @return Banner
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return integer 
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Banner
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return Banner
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }
}
