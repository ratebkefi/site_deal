<?php

namespace Main\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GpgLog
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Main\FrontBundle\Entity\GpgLogRepository")
 */
class GpgLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="datelog", type="date")
     */
    private $datelog;

    /**
     * @var text $data
     *
     * @ORM\Column(name="data", type="text")
     */
    private $data;
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer")
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat_payement", type="integer")
     */
    private $etatPayement;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;


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
     * Set datelog
     *
     * @param \DateTime $datelog
     * @return GpgLog
     */
    public function setDatelog($datelog)
    {
        $this->datelog = $datelog;

        return $this;
    }

    /**
     * Get datelog
     *
     * @return \DateTime 
     */
    public function getDatelog()
    {
        return $this->datelog;
    }

    /**
     * Set idCommande
     *
     * @param integer $idCommande
     * @return GpgLog
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get idCommande
     *
     * @return integer 
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Set etatPayement
     *
     * @param integer $etatPayement
     * @return GpgLog
     */
    public function setEtatPayement($etatPayement)
    {
        $this->etatPayement = $etatPayement;

        return $this;
    }

    /**
     * Get etatPayement
     *
     * @return integer 
     */
    public function getEtatPayement()
    {
        return $this->etatPayement;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return GpgLog
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return GpgLog
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }
}
