<?php

namespace Back\CommandeBundle\Entity;
use Symfony\Component\validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
/**
 * MessageTicket
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TicketMessage
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
     * @ORM\Column(name="message", type="text")
     */
    private $message;


    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="ticketmessage")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="ticketmessage")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $user;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dpa", type="datetime")
     */
    private $dpa;
    /**
     * @ORM\ManyToOne(targetEntity="Ticket", inversedBy="ticketmessage")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $ticket;
    /**
* @Assert\File(
*     maxSize = "2048k",
*     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
*     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Seuls les types de fichiers image sont autorisés."
    * )
     */

    public   $file;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    /**
     * Constuct
     */
    public function __construct(){
        $this->setDpa(new \DateTime());
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            $this->path = $this->file->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $tab=explode(".",$this->file->getClientOriginalName());
        $tab=array_reverse($tab);
        $filename=((time($tab)*9851)+rand(500,98765412)).".".$tab[0];

        $this->file->move($this->getUploadRootDir(), $filename);

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $filename;

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/ticket';
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
     * @return TicketMessage
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
     * Set dpa
     *
     * @param \DateTime $dpa
     * @return TicketMessage
     */
    public function setDpa($dpa)
    {
        $this->dpa = $dpa;

        return $this;
    }

    /**
     * Get dpa
     *
     * @return \DateTime 
     */
    public function getDpa()
    {
        return $this->dpa;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return TicketMessage
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set client
     *
     * @param \Back\CommandeBundle\Entity\Client $client
     * @return TicketMessage
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
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return TicketMessage
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
     * Set ticket
     *
     * @param \Back\CommandeBundle\Entity\Ticket $ticket
     * @return TicketMessage
     */
    public function setTicket(\Back\CommandeBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Back\CommandeBundle\Entity\Ticket 
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}
