<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageTicket
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MessageTicket
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
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dpa", type="datetime")
     */
    private $dpa;

    

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
     * @return MessageTicket
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
     * Set file
     *
     * @param string $file
     * @return MessageTicket
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return MessageTicket
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
     * Set object
     *
     * @param string $object
     * @return MessageTicket
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
     * Set dpa
     *
     * @param \DateTime $dpa
     * @return MessageTicket
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
}
