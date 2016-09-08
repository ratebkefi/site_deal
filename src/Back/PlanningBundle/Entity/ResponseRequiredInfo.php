<?php

namespace Back\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResponseRequiredInfo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PlanningBundle\Entity\ResponseRequiredInfoRepository")
 */
class ResponseRequiredInfo {

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
     * @ORM\Column(name="response", type="string", length=255)
     */
    private $response;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="requiredInfo", inversedBy="responserequiredinfo")
     * @ORM\JoinColumn(name="requiredInfoid", referencedColumnName="id",onDelete="CASCADE")
     */
    private $requiredInfoId;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="requiredInfo", mappedBy="responserequiredinfo" )
     */
    private $requiredInfo;

    /**
     * @ORM\ManyToOne(targetEntity="Back\ContractBundle\Entity\Annexe", inversedBy="responserequiredinfo")
     * @ORM\JoinColumn(name="annexe_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $annexe;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requiredInfo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set response
     *
     * @param string $response
     * @return ResponseRequiredInfo
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set requiredInfoId
     *
     * @param \Back\PlanningBundle\Entity\requiredInfo $requiredInfoId
     * @return ResponseRequiredInfo
     */
    public function setRequiredInfoId(\Back\PlanningBundle\Entity\requiredInfo $requiredInfoId = null)
    {
        $this->requiredInfoId = $requiredInfoId;

        return $this;
    }

    /**
     * Get requiredInfoId
     *
     * @return \Back\PlanningBundle\Entity\requiredInfo 
     */
    public function getRequiredInfoId()
    {
        return $this->requiredInfoId;
    }

    /**
     * Add requiredInfo
     *
     * @param \Back\PlanningBundle\Entity\requiredInfo $requiredInfo
     * @return ResponseRequiredInfo
     */
    public function addRequiredInfo(\Back\PlanningBundle\Entity\requiredInfo $requiredInfo)
    {
        $this->requiredInfo[] = $requiredInfo;

        return $this;
    }

    /**
     * Remove requiredInfo
     *
     * @param \Back\PlanningBundle\Entity\requiredInfo $requiredInfo
     */
    public function removeRequiredInfo(\Back\PlanningBundle\Entity\requiredInfo $requiredInfo)
    {
        $this->requiredInfo->removeElement($requiredInfo);
    }

    /**
     * Get requiredInfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRequiredInfo()
    {
        return $this->requiredInfo;
    }

    /**
     * Set annexe
     *
     * @param \Back\ContractBundle\Entity\Annexe $annexe
     * @return ResponseRequiredInfo
     */
    public function setAnnexe(\Back\ContractBundle\Entity\Annexe $annexe = null)
    {
        $this->annexe = $annexe;

        return $this;
    }

    /**
     * Get annexe
     *
     * @return \Back\ContractBundle\Entity\Annexe 
     */
    public function getAnnexe()
    {
        return $this->annexe;
    }
}
