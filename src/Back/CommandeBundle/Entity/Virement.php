<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Virement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Virement
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
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=255)
     */
    private $rib;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="integer",nullable=true)
     */
    private $etat;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="date",nullable=true)
     */
    private $dcr;
    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="text",nullable=true)
     */
    private $remarque;
    /**
     * @Assert\File(maxSize="2048k")
     */
    public   $file;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @ORM\OneToMany(targetEntity="Remboursement", mappedBy="virement")
     */
    private $remboursement;
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
        return 'uploads/virement';
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
     * Set montant
     *
     * @param float $montant
     * @return Virement
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set rib
     *
     * @param string $rib
     * @return Virement
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return Virement
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     * @return Virement
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Virement
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
     * Constructor
     */
    public function __construct()
    {
        $this->remboursement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add remboursement
     *
     * @param \Back\CommandeBundle\Entity\Remboursement $remboursement
     * @return Virement
     */
    public function addRemboursement(\Back\CommandeBundle\Entity\Remboursement $remboursement)
    {
        $this->remboursement[] = $remboursement;

        return $this;
    }

    /**
     * Remove remboursement
     *
     * @param \Back\CommandeBundle\Entity\Remboursement $remboursement
     */
    public function removeRemboursement(\Back\CommandeBundle\Entity\Remboursement $remboursement)
    {
        $this->remboursement->removeElement($remboursement);
    }

    /**
     * Get remboursement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemboursement()
    {
        return $this->remboursement;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Virement
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
     * Set dcra
     *
     * @param \DateTime $dcra
     * @return Virement
     */
    public function setDcra($dcra)
    {
        $this->dcra = $dcra;

        return $this;
    }

    /**
     * Get dcra
     *
     * @return \DateTime 
     */
    public function getDcra()
    {
        return $this->dcra;
    }
}
