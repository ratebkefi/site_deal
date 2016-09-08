<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Smstmp
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DashBundle\Entity\SmstmpRepository")
 */
class Smstmp
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
     * @ORM\Column(name="phone", type="string", length=8)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="Sms", inversedBy="smstmp")
     * @ORM\JoinColumn(name="sms_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $sms;
    /**
     * @var integer
     *
     * @ORM\Column(name="operator", type="integer")
     */
    private $operator;


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
     * Set phone
     *
     * @param string $phone
     * @return Smstmp
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
     * Set operator
     *
     * @param integer $operator
     * @return Smstmp
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return integer
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set sms
     *
     * @param \Back\DashBundle\Entity\Sms $sms
     * @return Smstmp
     */
    public function setSms(\Back\DashBundle\Entity\Sms $sms = null)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return \Back\DashBundle\Entity\Sms
     */
    public function getSms()
    {
        return $this->sms;
    }
}
