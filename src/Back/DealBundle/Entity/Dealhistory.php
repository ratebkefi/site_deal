<?php

namespace Back\DealBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dealhistory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DealBundle\Entity\DealhistoryRepository")
 */
class Dealhistory
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
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;
    /**
     * @ORM\ManyToOne(targetEntity="Deal", inversedBy="dealhistory")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")
     * */
    private $deal;
    public function __construct(){
        $this->dcr=new \DateTime();
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
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Dealhistory
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
     * Set type
     *
     * @param integer $type
     * @return Dealhistory
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
     * Set deal
     *
     * @param \Back\DealBundle\Entity\Deal $deal
     * @return Dealhistory
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
