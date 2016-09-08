<?php

namespace Back\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotificationSms
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\DashBundle\Entity\NotificationRepository")
 */
class NotificationSms
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
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Command", inversedBy="notificationsms")
     * @ORM\JoinColumn(name="commande_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $commande;
    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Client", inversedBy="notificationsms")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $client;

    function __construct()
    {
        $this->dcr =  new \DateTime();
        
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
     * Set message
     *
     * @param string $message
     * @return NotificationSms
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    
    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return NotificationSms
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
     * Set client
     *
     * @param \Back\CommandeBundle\Entity\Client $client
     * @return NotificationSms
     */
    public function setClient(\Back\CommandeBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Back\CommandeBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
	
	
	/**
     * Set commande
     *
     * @param \Back\CommandeBundle\Entity\Command $commande
     * @return NotificationSms
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
}
