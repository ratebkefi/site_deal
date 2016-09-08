<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\LocaliteRepository")
 */
class Localite
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var integer
     *
     * @ORM\Column(name="cp", type="integer", nullable=true)
     */
    private $cp;
    /**
     * @ORM\ManyToOne(targetEntity="Localite", inversedBy="localite")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Localite", mappedBy="localite", cascade={"remove"})
     */
    private $child;
    /**
     * __tostring
     */
    public function __toString(){
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->child = new \Doctrine\Common\Collections\ArrayCollection();
        $this->exid=null;
        $this->cp=null;
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
     * Set name
     *
     * @param string $name
     * @return Localite
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Localite
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set parent
     *
     * @param \Back\CommandeBundle\Entity\Localite $parent
     * @return Localite
     */
    public function setParent(\Back\CommandeBundle\Entity\Localite $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Back\CommandeBundle\Entity\Localite 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child
     *
     * @param \Back\CommandeBundle\Entity\Localite $child
     * @return Localite
     */
    public function addChild(\Back\CommandeBundle\Entity\Localite $child)
    {
        $this->child[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Back\CommandeBundle\Entity\Localite $child
     */
    public function removeChild(\Back\CommandeBundle\Entity\Localite $child)
    {
        $this->child->removeElement($child);
    }

    /**
     * Get child
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChild()
    {
        return $this->child;
    }
}
