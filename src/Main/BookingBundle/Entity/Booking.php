<?php

namespace Main\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Main\BookingBundle\Entity\BookingRepository")
 */
class Booking
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
     * @ORM\Column(name="booking", type="datetime")
     */
    private $booking;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Coupon", inversedBy="booking")
     * @ORM\JoinColumn(name="coupon_id", referencedColumnName="id")
     */
    private $coupon;
    /**
     * @ORM\ManyToOne(targetEntity="Back\DealBundle\Entity\Deal", inversedBy="booking")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")
     */
    private $deal;
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
     * Set booking
     *
     * @param \DateTime $booking
     * @return Booking
     */
    public function setBooking($booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Get booking
     *
     * @return \DateTime 
     */
    public function getBooking()
    {
        return  $this->booking;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Booking
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
     * Set coupon
     *
     * @param \Back\CommandeBundle\Entity\Coupon $coupon
     * @return Booking
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
     * Set deal
     *
     * @param \Back\DealBundle\Entity\Deal $deal
     * @return Booking
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
}
