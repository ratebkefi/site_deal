<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentMethod
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\PaymentMethodRepository")
 */
class PaymentMethod
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
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="act", type="boolean")
     */
    private $act;

    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="PaymentMethod", cascade={"remove"})
     */
    private $operation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->act=false;
        $this->operation = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return PaymentMethod
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
     * @return PaymentMethod
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
     * Add operation
     *
     * @param \Back\CommandeBundle\Entity\Operation $operation
     * @return PaymentMethod
     */
    public function addOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {
        $this->operation[] = $operation;

        return $this;
    }

    /**
     * Remove operation
     *
     * @param \Back\CommandeBundle\Entity\Operation $operation
     */
    public function removeOperation(\Back\CommandeBundle\Entity\Operation $operation)
    {
        $this->operation->removeElement($operation);
    }

    /**
     * Get operation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperation()
    {
        return $this->operation;
    }
}
