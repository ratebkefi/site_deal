<?php

namespace Back\PartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table("schedule")
 * @ORM\Entity(repositoryClass="Back\PartnerBundle\Entity\ScheduleRepository")
 */
class Schedule
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
     * @ORM\Column(name="day", type="string", length=255)
     */
    private $day;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="openTimeMorning", type="time")
     */
    private $openTimeMorning;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeTimeMorning", type="time")
     */
    private $closeTimeMorning;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="openTimeAfternoon", type="time")
     */
    private $openTimeAfternoon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeTimeAfternoon", type="time")
     */
    private $closeTimeAfternoon;
    /**
     * @ORM\ManyToOne(targetEntity="SellingPoint", inversedBy="schedule")
     * @ORM\JoinColumn(name="sellingpoint_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $sellingpoint;

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
     * Set day
     *
     * @param string $day
     * @return Schedule
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set openTimeMorning
     *
     * @param \DateTime $openTimeMorning
     * @return Schedule
     */
    public function setOpenTimeMorning($openTimeMorning)
    {
        $this->openTimeMorning = $openTimeMorning;

        return $this;
    }

    /**
     * Get openTimeMorning
     *
     * @return \DateTime 
     */
    public function getOpenTimeMorning()
    {
        return $this->openTimeMorning;
    }

    /**
     * Set closeTimeMorning
     *
     * @param \DateTime $closeTimeMorning
     * @return Schedule
     */
    public function setCloseTimeMorning($closeTimeMorning)
    {
        $this->closeTimeMorning = $closeTimeMorning;

        return $this;
    }

    /**
     * Get closeTimeMorning
     *
     * @return \DateTime 
     */
    public function getCloseTimeMorning()
    {
        return $this->closeTimeMorning;
    }

    /**
     * Set openTimeAfternoon
     *
     * @param \DateTime $openTimeAfternoon
     * @return Schedule
     */
    public function setOpenTimeAfternoon($openTimeAfternoon)
    {
        $this->openTimeAfternoon = $openTimeAfternoon;

        return $this;
    }

    /**
     * Get openTimeAfternoon
     *
     * @return \DateTime 
     */
    public function getOpenTimeAfternoon()
    {
        return $this->openTimeAfternoon;
    }

    /**
     * Set closeTimeAfternoon
     *
     * @param \DateTime $closeTimeAfternoon
     * @return Schedule
     */
    public function setCloseTimeAfternoon($closeTimeAfternoon)
    {
        $this->closeTimeAfternoon = $closeTimeAfternoon;

        return $this;
    }

    /**
     * Get closeTimeAfternoon
     *
     * @return \DateTime 
     */
    public function getCloseTimeAfternoon()
    {
        return $this->closeTimeAfternoon;
    }

    /**
     * Set sellingpoint
     *
     * @param \Back\PartnerBundle\Entity\SellingPoint $sellingpoint
     * @return Schedule
     */
    public function setSellingpoint(\Back\PartnerBundle\Entity\SellingPoint $sellingpoint = null)
    {
        $this->sellingpoint = $sellingpoint;

        return $this;
    }

    /**
     * Get sellingpoint
     *
     * @return \Back\PartnerBundle\Entity\SellingPoint 
     */
    public function getSellingpoint()
    {
        return $this->sellingpoint;
    }
}
