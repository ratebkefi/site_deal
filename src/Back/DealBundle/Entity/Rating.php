<?php

namespace Back\DealBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DCS\RatingBundle\Entity\Rating as BaseRating;
/**
 * Rating
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DealBundle\Entity\RatingRepository")
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Rating extends BaseRating
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="rating")
     */
    protected $votes;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }



    /**
     * Set id
     *
     * @param string $id
     * @return Rating
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }





}
