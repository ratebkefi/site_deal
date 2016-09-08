<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="post_id",type="string", length=255)
     */
    private $idPost;


    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Client", inversedBy="post")
     * @ORM\JoinColumn(name="id_client", referencedColumnName="id",onDelete="CASCADE")
     */
    private $idClient;

    /**
     * @ORM\ManyToOne(targetEntity="Back\DealBundle\Entity\Deal", inversedBy="post")
     * @ORM\JoinColumn(name="id_deal", referencedColumnName="id",onDelete="CASCADE")
     */
    private $idDeal;


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
     * Set idPost
     *
     * @param integer $idPost
     * @return Post
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer 
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set idClient
     *
     * @param \Back\CommandeBundle\Entity\Client $idClient
     * @return Post
     */
    public function setIdClient(\Back\CommandeBundle\Entity\Client $idClient = null)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return \Back\CommandeBundle\Entity\Client 
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set idDeal
     *
     * @param \Back\DealBundle\Entity\Deal $idDeal
     * @return Post
     */
    public function setIdDeal(\Back\DealBundle\Entity\Deal $idDeal = null)
    {
        $this->idDeal = $idDeal;

        return $this;
    }

    /**
     * Get idDeal
     *
     * @return \Back\DealBundle\Entity\Deal 
     */
    public function getIdDeal()
    {
        return $this->idDeal;
    }
}
