<?php

namespace Back\DealBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DCS\RatingBundle\Entity\Vote as BaseVote;
/**
 * Vote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DealBundle\Entity\VoteRepository")
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Vote extends BaseVote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Rating", inversedBy="votes")
     * @ORM\JoinColumn(name="rating_id", referencedColumnName="id")
     */
    protected $rating;

    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Client", inversedBy="votes")
     */
    protected $voter;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;
    /**
     * @var boolean
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;
    /**
     * @var date
     *
     * @ORM\Column(name="dcr", type="date")
     */
    private $dcr;
    /**
     * Constructor
     */
    public function __construct(){
        parent::__construct();
        $this->act=false;
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
     * Get rating
     *
     * @return \Back\DealBundle\Entity\Rating 
     */
    public function getRating()
    {
        return $this->rating;
    }



    /**
     * Get voter
     *
     * @return \Back\CommandeBundle\Entity\Client 
     */
    public function getVoter()
    {
        return $this->voter;
    }


    /**
     * Set comment
     *
     * @param string $comment
     * @return Vote
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set act
     *
     * @param boolean $act
     * @return Vote
     */
    public function setAct($act)
    {
        $this->act = $act;

        return $this;
    }

    /**
     * Get act
     *
     * @return boolean 
     */
    public function getAct()
    {
        return $this->act;
    }



    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Vote
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

}
