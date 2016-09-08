<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="User\UserBundle\Entity\ContractRepository")
 */
class Contract
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
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire1", type="float")
     */
    private $salaire1;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire2", type="float")
     */
    private $salaire2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stardate", type="date")
     */
    private $stardate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date")
     */
    private $enddate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="contract")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $user;
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
     * Set type
     *
     * @param integer $type
     * @return Contract
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set salaire1
     *
     * @param float $salaire1
     * @return Contract
     */
    public function setSalaire1($salaire1)
    {
        $this->salaire1 = $salaire1;

        return $this;
    }

    /**
     * Get salaire1
     *
     * @return float 
     */
    public function getSalaire1()
    {
        return $this->salaire1;
    }

    /**
     * Set salaire2
     *
     * @param float $salaire2
     * @return Contract
     */
    public function setSalaire2($salaire2)
    {
        $this->salaire2 = $salaire2;

        return $this;
    }

    /**
     * Get salaire2
     *
     * @return float 
     */
    public function getSalaire2()
    {
        return $this->salaire2;
    }

    /**
     * Set stardate
     *
     * @param \DateTime $stardate
     * @return Contract
     */
    public function setStardate($stardate)
    {
        $this->stardate = $stardate;

        return $this;
    }

    /**
     * Get stardate
     *
     * @return \DateTime 
     */
    public function getStardate()
    {
        return $this->stardate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Contract
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Contract
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Contract
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
}
