<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bank
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\BankRepository")
 */
class Bank
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;
    /**
     * @var boolean
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;
    /**
     * @ORM\OneToMany(targetEntity="User\UserBundle\Entity\User", mappedBy="user", cascade={"remove"})
     */
    private $user;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->act=true;
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * tostring
     */
    public function __toString(){
        return $this->name;
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
     * @return Bank
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
     * Set act
     *
     * @param boolean $act
     * @return Bank
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
     * Add user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Bank
     */
    public function addUser(\User\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \User\UserBundle\Entity\User $user
     */
    public function removeUser(\User\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
