<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coupon
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\CouponRepository")
 */
class Coupon
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="vendu", type="integer")
     */
    private $vendu;

    /**
     * @var integer
     *
     * @ORM\Column(name="recu", type="integer")
     */
    private $recu;

    /**
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=255,nullable=true)
     */
    private $client;
    /**
     * @var date
     *
     * @ORM\Column(name="dcr", type="date")
     */
    private $dcr;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255,nullable=true)
     */
    private $code;
    /**
     * @var string
     *
     * @ORM\Column(name="aramexid", type="string", length=255,nullable=true)
     */
    private $aramexid;
    /**
     * @var string
     *
     * @ORM\Column(name="aramexpdf", type="string", length=255,nullable=true)
     */
    private $aramexpdf;
    /**
     * @ORM\ManyToOne(targetEntity="Command", inversedBy="coupon")
     * @ORM\JoinColumn(name="command_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $command;
    /**
     * @ORM\ManyToOne(targetEntity="Back\PartnerBundle\Entity\Invoice", inversedBy="coupon")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id",onDelete="CASCADE" ,nullable=true)
     */
    private $invoice;
    /**
     * @ORM\OneToMany(targetEntity="Main\BookingBundle\Entity\Booking", mappedBy="coupon")
     */
    private $booking;
    /**
     * contruct
     */
    public function __construct()
    {
        $this->vendu = 1;
        $this->recu = 1;
        $this->dcr=new \DateTime();
    }
    /**
     * toString
     */
    public function __toString()
    {
        return $this->code;
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
     * Set price
     *
     * @param float $price
     * @return Coupon
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
     * Set vendu
     *
     * @param integer $vendu
     * @return Coupon
     */
    public function setVendu($vendu)
    {
        $this->vendu = $vendu;

        return $this;
    }

    /**
     * Get vendu
     *
     * @return integer 
     */
    public function getVendu()
    {
        return $this->vendu;
    }

    /**
     * Set recu
     *
     * @param integer $recu
     * @return Coupon
     */
    public function setRecu($recu)
    {
        $this->recu = $recu;

        return $this;
    }

    /**
     * Get recu
     *
     * @return integer 
     */
    public function getRecu()
    {
        return $this->recu;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return Coupon
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Coupon
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
     * Set code
     *
     * @param string $code
     * @return Coupon
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     * @return Coupon
     */
    public function setCommand(\Back\CommandeBundle\Entity\Command $command = null)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return \Back\CommandeBundle\Entity\Command 
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set invoice
     *
     * @param \Back\PartnerBundle\Entity\Invoice $invoice
     * @return Coupon
     */
    public function setInvoice(\Back\PartnerBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Back\PartnerBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Add booking
     *
     * @param \Main\BookingBundle\Entity\Booking $booking
     * @return Coupon
     */
    public function addBooking(\Main\BookingBundle\Entity\Booking $booking)
    {
        $this->booking[] = $booking;

        return $this;
    }

    /**
     * Remove booking
     *
     * @param \Main\BookingBundle\Entity\Booking $booking
     */
    public function removeBooking(\Main\BookingBundle\Entity\Booking $booking)
    {
        $this->booking->removeElement($booking);
    }

    /**
     * Get booking
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Set aramexid
     *
     * @param string $aramexid
     * @return Coupon
     */
    public function setAramexid($aramexid)
    {
        $this->aramexid = $aramexid;

        return $this;
    }

    /**
     * Get aramexid
     *
     * @return string 
     */
    public function getAramexid()
    {
        return $this->aramexid;
    }

    /**
     * Set aramexpdf
     *
     * @param string $aramexpdf
     * @return Coupon
     */
    public function setAramexpdf($aramexpdf)
    {
        $this->aramexpdf = $aramexpdf;

        return $this;
    }

    /**
     * Get aramexpdf
     *
     * @return string 
     */
    public function getAramexpdf()
    {
        return $this->aramexpdf;
    }
}
