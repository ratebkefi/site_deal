<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Collection;
/**
 * Ticket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\TichetRepository")
 */
class Ticket
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
     * @ORM\Column(name="object", type="string", length=255)
     */
    private $object;
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    /**
     * @var integer
     *
     * @ORM\Column(name="priorite", type="integer")
     */
    private $priorite;

    /**
     * @ORM\ManyToOne(targetEntity="Command", inversedBy="ticket")
     * @ORM\JoinColumn(name="command_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $commande;
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="ticket")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;
    /**
     * @ORM\OneToMany(targetEntity="TicketMessage", mappedBy="ticket", cascade={"persist"})
     * @OrderBy({"id" = "DESC"})
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;

    public function __construct()
    {
        $this->status=2;
        $this->message = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commande = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set commande
     *
     * @param \Back\CommandeBundle\Entity\Command $commande
     * @return Ticket
     */
    public function setCommande(\Back\CommandeBundle\Entity\Command $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Back\CommandeBundle\Entity\Command 
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set object
     *
     * @param string $object
     * @return Ticket
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Ticket
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Ticket
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set priorite
     *
     * @param integer $priorite
     * @return Ticket
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * Get priorite
     *
     * @return integer 
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Ticket
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Ticket
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
     * Add message
     *
     * @param \Back\CommandeBundle\Entity\TicketMessage $message
     * @return Ticket
     */
    public function addMessage(\Back\CommandeBundle\Entity\TicketMessage $message)
    {
        $this->message[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Back\CommandeBundle\Entity\TicketMessage $message
     */
    public function removeMessage(\Back\CommandeBundle\Entity\TicketMessage $message)
    {
        $this->message->removeElement($message);
    }

    /**
     * Get message
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessage()
    {
        return $this->message;
    }
}
