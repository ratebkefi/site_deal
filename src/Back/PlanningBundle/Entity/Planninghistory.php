<?php

namespace Back\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planninghistory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PlanningBundle\Entity\PlanninghistoryRepository")
 */
class Planninghistory
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
     * @ORM\ManyToOne(targetEntity="Planning", inversedBy="planninghistory")
     * @ORM\JoinColumn(name="planning_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $planning;
    /**
     * Construct
     */
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
     * @return Planninghistory
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
     * @return Planninghistory
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
     * Set planning
     *
     * @param \Back\PlanningBundle\Entity\Planning $planning
     * @return Planninghistory
     */
    public function setPlanning(\Back\PlanningBundle\Entity\Planning $planning = null)
    {
        $this->planning = $planning;

        return $this;
    }

    /**
     * Get planning
     *
     * @return \Back\PlanningBundle\Entity\Planning 
     */
    public function getPlanning()
    {
        return $this->planning;
    }
}
