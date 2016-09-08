<?php

namespace Back\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * requiredInfo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PlanningBundle\Entity\requiredInfoRepository")
 */
class requiredInfo {

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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="Categoryid", referencedColumnName="id",onDelete="CASCADE")
     */
    private $categoryId;

    /**
     * @ORM\OneToMany(targetEntity="ResponseRequiredInfo", mappedBy="requiredInfo")
     */
    protected $responserequiredinfo;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return requiredInfo
     */
    public function setQuestion($question) {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * Set categoryId
     *
     * @param \Back\PlanningBundle\Entity\Category $categoryId
     * @return requiredInfo
     */
    public function setCategoryId(\Back\PlanningBundle\Entity\Category $categoryId = null) {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return \Back\PlanningBundle\Entity\Category 
     */
    public function getCategoryId() {
        return $this->categoryId;
    }

    public function __toString() {
        return $this->getQuestion();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responserequiredinfo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add responserequiredinfo
     *
     * @param \Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo
     * @return requiredInfo
     */
    public function addResponserequiredinfo(\Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo)
    {
        $this->responserequiredinfo[] = $responserequiredinfo;

        return $this;
    }

    /**
     * Remove responserequiredinfo
     *
     * @param \Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo
     */
    public function removeResponserequiredinfo(\Back\PlanningBundle\Entity\ResponseRequiredInfo $responserequiredinfo)
    {
        $this->responserequiredinfo->removeElement($responserequiredinfo);
    }

    /**
     * Get responserequiredinfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponserequiredinfo()
    {
        return $this->responserequiredinfo;
    }
}
