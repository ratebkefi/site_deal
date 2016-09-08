<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checkc
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\CheckcRepository")
 */
class Checkc
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
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Coupon", inversedBy="checkc")
     * @ORM\JoinColumn(name="coupon_id", referencedColumnName="id")
     */
    private $coupon;


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
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Checkc
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
     * @return Checkc
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
}
