<?php

namespace Back\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Socialmedia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\PageBundle\Entity\SocialmediaRepository")
 */
class Socialmedia
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
     * @ORM\Column(name="icon", type="string", length=40)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer")
     */
    private $ord;


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
     * Set icon
     *
     * @param string $icon
     * @return Socialmedia
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set lien
     *
     * @param string $lien
     * @return Socialmedia
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string 
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return Socialmedia
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer 
     */
    public function getOrd()
    {
        return $this->ord;
    }
}
