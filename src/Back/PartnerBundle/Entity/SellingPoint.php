<?php

namespace Back\PartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SellingPoint
 *
 * @ORM\Table("sellingpoint")
 * @ORM\Entity(repositoryClass="Back\PartnerBundle\Entity\SellingPointRepository")
 */
class SellingPoint {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string",nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string",nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255,nullable=true)
     */
    private $phone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean",nullable=true)
     */
    private $visible;

    /**
     * @var string
     *
     * @ORM\Column(name="visible_adress", type="string", length=255,nullable=true)
     */
    private $visibleAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="lat_visible_adress", type="string", length=255,nullable=true)
     */
    private $latVisibleAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="lon_visible_adress", type="string", length=255,nullable=true)
     */
    private $lonVisibleAdress;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_employee", type="integer")
     */
    private $nbrEmployee;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity_per_hour", type="integer")
     */
    private $capacityPerHour;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="sellingpoint")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="sellingpoint", cascade={"remove"})
     */
    protected $schedule;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Localite", inversedBy="sellingpoint")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $localite;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schedule = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SellingPoint
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
     * Set adress
     *
     * @param string $adress
     * @return SellingPoint
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
     * Set latitude
     *
     * @param string $latitude
     * @return SellingPoint
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return SellingPoint
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return SellingPoint
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return SellingPoint
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set visibleAdress
     *
     * @param string $visibleAdress
     * @return SellingPoint
     */
    public function setVisibleAdress($visibleAdress)
    {
        $this->visibleAdress = $visibleAdress;

        return $this;
    }

    /**
     * Get visibleAdress
     *
     * @return string 
     */
    public function getVisibleAdress()
    {
        return $this->visibleAdress;
    }

    /**
     * Set latVisibleAdress
     *
     * @param string $latVisibleAdress
     * @return SellingPoint
     */
    public function setLatVisibleAdress($latVisibleAdress)
    {
        $this->latVisibleAdress = $latVisibleAdress;

        return $this;
    }

    /**
     * Get latVisibleAdress
     *
     * @return string 
     */
    public function getLatVisibleAdress()
    {
        return $this->latVisibleAdress;
    }

    /**
     * Set lonVisibleAdress
     *
     * @param string $lonVisibleAdress
     * @return SellingPoint
     */
    public function setLonVisibleAdress($lonVisibleAdress)
    {
        $this->lonVisibleAdress = $lonVisibleAdress;

        return $this;
    }

    /**
     * Get lonVisibleAdress
     *
     * @return string 
     */
    public function getLonVisibleAdress()
    {
        return $this->lonVisibleAdress;
    }

    /**
     * Set nbrEmployee
     *
     * @param integer $nbrEmployee
     * @return SellingPoint
     */
    public function setNbrEmployee($nbrEmployee)
    {
        $this->nbrEmployee = $nbrEmployee;

        return $this;
    }

    /**
     * Get nbrEmployee
     *
     * @return integer 
     */
    public function getNbrEmployee()
    {
        return $this->nbrEmployee;
    }

    /**
     * Set capacityPerHour
     *
     * @param integer $capacityPerHour
     * @return SellingPoint
     */
    public function setCapacityPerHour($capacityPerHour)
    {
        $this->capacityPerHour = $capacityPerHour;

        return $this;
    }

    /**
     * Get capacityPerHour
     *
     * @return integer 
     */
    public function getCapacityPerHour()
    {
        return $this->capacityPerHour;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return SellingPoint
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
     * Add schedule
     *
     * @param \Back\PartnerBundle\Entity\Schedule $schedule
     * @return SellingPoint
     */
    public function addSchedule(\Back\PartnerBundle\Entity\Schedule $schedule)
    {
        $this->schedule[] = $schedule;

        return $this;
    }

    /**
     * Remove schedule
     *
     * @param \Back\PartnerBundle\Entity\Schedule $schedule
     */
    public function removeSchedule(\Back\PartnerBundle\Entity\Schedule $schedule)
    {
        $this->schedule->removeElement($schedule);
    }

    /**
     * Get schedule
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set localite
     *
     * @param \Back\CommandeBundle\Entity\Localite $localite
     * @return SellingPoint
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
}
