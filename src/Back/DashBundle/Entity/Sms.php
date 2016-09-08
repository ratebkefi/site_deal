<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sms
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DashBundle\Entity\SmsRepository")
 */
class Sms
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="string", length=160)
     */
    private $body;

    /**
     * @var boolean
     *
     * @ORM\Column(name="send", type="boolean")
     */
    private $send;
    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="date")
     */
    private $dcr;
    /**
     * @ORM\OneToMany(targetEntity="Smstmp", mappedBy="sms", cascade={"remove"})
     */
    private $smstmp;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dcr = new \DateTime();
        $this->send = false;
        $this->total=0;
        $this->smstmp = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Sms
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
     * Set body
     *
     * @param string $body
     * @return Sms
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set send
     *
     * @param boolean $send
     * @return Sms
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return boolean
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Sms
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
     * Add smstmp
     *
     * @param \Back\DashBundle\Entity\Smstmp $smstmp
     * @return Sms
     */
    public function addSmstmp(\Back\DashBundle\Entity\Smstmp $smstmp)
    {
        $this->smstmp[] = $smstmp;

        return $this;
    }

    /**
     * Remove smstmp
     *
     * @param \Back\DashBundle\Entity\Smstmp $smstmp
     */
    public function removeSmstmp(\Back\DashBundle\Entity\Smstmp $smstmp)
    {
        $this->smstmp->removeElement($smstmp);
    }

    /**
     * Get smstmp
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSmstmp()
    {
        return $this->smstmp;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Sms
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
