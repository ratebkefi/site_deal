<?php

namespace User\UserBundle\Entity;

use Back\DashBundle\Common\Tools;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Util\SecureRandom;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity (repositoryClass="User\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100,nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Bank", inversedBy="user")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     **/
    private $bank;

    /**
     * @var string
     *
     * @ORM\Column(name="agency", type="string", length=255, nullable=true)
     */
    private $agency;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=20, nullable=true)
     */
    private $rib;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255,nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=8,nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="web_site", type="string", length=255,nullable=true)
     */
    private $webSite;

    /**
     * @var string
     *
     * @ORM\Column(name="fbpage", type="string", length=255,nullable=true)
     */
    private $fbpage;
    /**
     * @var date
     *
     * @ORM\Column(name="datenaisse", type="date",nullable=true)
     */
    private $datenaisse;
    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=8,nullable=true)
     */
    private $cin;
    /**
     * @var date
     *
     * @ORM\Column(name="datecin", type="date",nullable=true)
     */
    private $datecin;
    /**
     * @var string
     *
     * @ORM\Column(name="phoneurg", type="string", length=80,nullable=true)
     */
    private $phoneurg;
    /**
     * @var string
     *
     * @ORM\Column(name="adresseurg", type="string", length=255,nullable=true)
     */
    private $adresseurg;
    /**
     * @var string
     *
     * @ORM\Column(name="tva", type="string", length=255,nullable=true)
     */
    private $tva;

    /**
     * @ORM\OneToMany(targetEntity="Back\PartnerBundle\Entity\ContactPartner", mappedBy="user", cascade={"remove"})
     */
    protected $contactpartner;

    /**
     * @ORM\OneToMany(targetEntity="Back\ContractBundle\Entity\Protocol", mappedBy="user", cascade={"remove"})
     */
    protected $protocol;
    /**
     * @ORM\OneToMany(targetEntity="Back\PartnerBundle\Entity\SellingPoint", mappedBy="user", cascade={"remove"})
     */
    protected $sellingpoint;
    /**
     * @ORM\ManyToMany(targetEntity="Back\PlanningBundle\Entity\Region", inversedBy="user")
     * @ORM\JoinTable(name="region_partner")
     * */
    protected $region;
    /**
     * @ORM\OneToMany(targetEntity="Back\CommandeBundle\Entity\Command", mappedBy="user", cascade={"remove"})
     */
    private $command;
    /**
     * @ORM\OneToOne(targetEntity="Back\CommandeBundle\Entity\Caisse", mappedBy="user", cascade={"remove"})
     */
    private $caisse;

    /**
     * @ORM\ManyToOne(targetEntity="Back\PlanningBundle\Entity\Category", inversedBy="user")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Back\CommandeBundle\Entity\Operation", mappedBy="user", cascade={"remove"})
     */
    private $operation;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dmj", type="datetime", nullable=true)
     */
    private $dmj;
    /**
     * @Assert\File(maxSize="2048k")
     * @Assert\Image(mimeTypesMessage="Please upload a valid image.")
     */
    protected $profilePictureFile;

    // for temporary storage
    private $tempProfilePicturePath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $profilePicturePath;

    /**
     * @ORM\ManyToOne(targetEntity="Back\CommandeBundle\Entity\Localite", inversedBy="user")
     * @ORM\JoinColumn(name="localite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $localite;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->contactpartner = new \Doctrine\Common\Collections\ArrayCollection();
        $this->protocol = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sellingpoint = new \Doctrine\Common\Collections\ArrayCollection();
        $this->region = new \Doctrine\Common\Collections\ArrayCollection();
        $this->command = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operation = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Sets the file used for profile picture uploads
     *
     * @param UploadedFile $file
     * @return object
     */
    public function setProfilePictureFile(UploadedFile $file = null) {
        // set the value of the holder

        $this->profilePictureFile       =   $file;

        // check if we have an old image path
        if (isset($this->profilePicturePath)) {
            // store the old name to delete after the update
            $this->tempProfilePicturePath = $this->profilePicturePath;
            $this->profilePicturePath = null;
        } else {
            $this->profilePicturePath = 'initial';
        }

        return $this;
    }

    /**
     * Get the file used for profile picture uploads
     *
     * @return UploadedFile
     */
    public function getProfilePictureFile() {

        return $this->profilePictureFile;
    }

    /**
     * Set profilePicturePath
     *
     * @param string $profilePicturePath
     * @return User
     */
    public function setProfilePicturePath($profilePicturePath)
    {
        $this->profilePicturePath = $profilePicturePath;

        return $this;
    }

    /**
     * Get profilePicturePath
     *
     * @return string
     */
    public function getProfilePicturePath()
    {
        return $this->profilePicturePath;
    }

    /**
     * Get the absolute path of the profilePicturePath
     */
    public function getProfilePictureAbsolutePath() {
        return null === $this->profilePicturePath
            ? null
            : $this->getUploadRootDir().'/'.$this->profilePicturePath;
    }

    /**
     * Get root directory for file uploads
     *
     * @return string
     */
    protected function getUploadRootDir($type='profilePicture') {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir($type);
    }

    /**
     * Specifies where in the /web directory profile pic uploads are stored
     *
     * @return string
     */
    protected function getUploadDir($type='profilePicture') {
        // the type param is to change these methods at a later date for more file uploads
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/user';
    }

    /**
     * Get the web path for the user
     *
     * @return string
     */
    public function getWebProfilePicturePath() {

        return '/'.$this->getUploadDir().'/'.$this->getProfilePicturePath();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadProfilePicture() {
        if (null !== $this->getProfilePictureFile()) {
            // a file was uploaded
            // generate a unique filename
            $filename = $this->generateRandomProfilePictureFilename();
            $this->setProfilePicturePath($filename.'.'.$this->getProfilePictureFile()->guessExtension());
        }
    }

    /**
     * Generates a 32 char long random filename
     *
     * @return string
     */
    public function generateRandomProfilePictureFilename() {
        $count                  =   0;
        do {
            $generator = new SecureRandom();
            $random = $generator->nextBytes(16);
            $randomString = bin2hex($random);
            $count++;
        }
        while(file_exists($this->getUploadRootDir().'/'.$randomString.'.'.$this->getProfilePictureFile()->guessExtension()) && $count < 50);

        return $randomString;
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     *
     * Upload the profile picture
     *
     * @return mixed
     */
    public function uploadProfilePicture() {
        // check there is a profile pic to upload
        if ($this->getProfilePictureFile() === null) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getProfilePictureFile()->move($this->getUploadRootDir(), $this->getProfilePicturePath());

        // check if we have an old image
        if (isset($this->tempProfilePicturePath) && file_exists($this->getUploadRootDir().'/'.$this->tempProfilePicturePath) && $this->tempProfilePicturePath!="") {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->tempProfilePicturePath);
            // clear the temp image path
            $this->tempProfilePicturePath = null;
        }
        $this->profilePictureFile = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeProfilePictureFile()
    {
        if ($file = $this->getProfilePictureAbsolutePath() && file_exists($this->getProfilePictureAbsolutePath())) {
            unlink($file);
        }
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
     * @return User
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
     * Set agency
     *
     * @param string $agency
     * @return User
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency
     *
     * @return string 
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set rib
     *
     * @param string $rib
     * @return User
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
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set webSite
     *
     * @param string $webSite
     * @return User
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;

        return $this;
    }

    /**
     * Get webSite
     *
     * @return string 
     */
    public function getWebSite()
    {
        return $this->webSite;
    }

    /**
     * Set fbpage
     *
     * @param string $fbpage
     * @return User
     */
    public function setFbpage($fbpage)
    {
        $this->fbpage = $fbpage;

        return $this;
    }

    /**
     * Get fbpage
     *
     * @return string 
     */
    public function getFbpage()
    {
        return $this->fbpage;
    }

    /**
     * Set datenaisse
     *
     * @param \DateTime $datenaisse
     * @return User
     */
    public function setDatenaisse($datenaisse)
    {
        $this->datenaisse = $datenaisse;

        return $this;
    }

    /**
     * Get datenaisse
     *
     * @return \DateTime 
     */
    public function getDatenaisse()
    {
        return $this->datenaisse;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set datecin
     *
     * @param \DateTime $datecin
     * @return User
     */
    public function setDatecin($datecin)
    {
        $this->datecin = $datecin;

        return $this;
    }

    /**
     * Get datecin
     *
     * @return \DateTime 
     */
    public function getDatecin()
    {
        return $this->datecin;
    }

    /**
     * Set phoneurg
     *
     * @param string $phoneurg
     * @return User
     */
    public function setPhoneurg($phoneurg)
    {
        $this->phoneurg = $phoneurg;

        return $this;
    }

    /**
     * Get phoneurg
     *
     * @return string 
     */
    public function getPhoneurg()
    {
        return $this->phoneurg;
    }

    /**
     * Set adresseurg
     *
     * @param string $adresseurg
     * @return User
     */
    public function setAdresseurg($adresseurg)
    {
        $this->adresseurg = $adresseurg;

        return $this;
    }

    /**
     * Get adresseurg
     *
     * @return string 
     */
    public function getAdresseurg()
    {
        return $this->adresseurg;
    }

    /**
     * Set tva
     *
     * @param string $tva
     * @return User
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return string 
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set dmj
     *
     * @param \DateTime $dmj
     * @return User
     */
    public function setDmj($dmj)
    {
        $this->dmj = $dmj;

        return $this;
    }

    /**
     * Get dmj
     *
     * @return \DateTime 
     */
    public function getDmj()
    {
        return $this->dmj;
    }

    /**
     * Set bank
     *
     * @param \Back\CommandeBundle\Entity\Bank $bank
     * @return User
     */
    public function setBank(\Back\CommandeBundle\Entity\Bank $bank = null)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return \Back\CommandeBundle\Entity\Bank 
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Add contactpartner
     *
     * @param \Back\PartnerBundle\Entity\ContactPartner $contactpartner
     * @return User
     */
    public function addContactpartner(\Back\PartnerBundle\Entity\ContactPartner $contactpartner)
    {
        $this->contactpartner[] = $contactpartner;

        return $this;
    }

    /**
     * Remove contactpartner
     *
     * @param \Back\PartnerBundle\Entity\ContactPartner $contactpartner
     */
    public function removeContactpartner(\Back\PartnerBundle\Entity\ContactPartner $contactpartner)
    {
        $this->contactpartner->removeElement($contactpartner);
    }

    /**
     * Get contactpartner
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactpartner()
    {
        return $this->contactpartner;
    }

    /**
     * Add protocol
     *
     * @param \Back\ContractBundle\Entity\Protocol $protocol
     * @return User
     */
    public function addProtocol(\Back\ContractBundle\Entity\Protocol $protocol)
    {
        $this->protocol[] = $protocol;

        return $this;
    }

    /**
     * Remove protocol
     *
     * @param \Back\ContractBundle\Entity\Protocol $protocol
     */
    public function removeProtocol(\Back\ContractBundle\Entity\Protocol $protocol)
    {
        $this->protocol->removeElement($protocol);
    }

    /**
     * Get protocol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Add sellingpoint
     *
     * @param \Back\PartnerBundle\Entity\SellingPoint $sellingpoint
     * @return User
     */
    public function addSellingpoint(\Back\PartnerBundle\Entity\SellingPoint $sellingpoint)
    {
        $this->sellingpoint[] = $sellingpoint;

        return $this;
    }

    /**
     * Remove sellingpoint
     *
     * @param \Back\PartnerBundle\Entity\SellingPoint $sellingpoint
     */
    public function removeSellingpoint(\Back\PartnerBundle\Entity\SellingPoint $sellingpoint)
    {
        $this->sellingpoint->removeElement($sellingpoint);
    }

    /**
     * Get sellingpoint
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSellingpoint()
    {
        return $this->sellingpoint;
    }

    /**
     * Add region
     *
     * @param \Back\PlanningBundle\Entity\Region $region
     * @return User
     */
    public function addRegion(\Back\PlanningBundle\Entity\Region $region)
    {
        $this->region[] = $region;

        return $this;
    }

    /**
     * Remove region
     *
     * @param \Back\PlanningBundle\Entity\Region $region
     */
    public function removeRegion(\Back\PlanningBundle\Entity\Region $region)
    {
        $this->region->removeElement($region);
    }

    /**
     * Get region
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     * @return User
     */
    public function addCommand(\Back\CommandeBundle\Entity\Command $command)
    {
        $this->command[] = $command;

        return $this;
    }

    /**
     * Remove command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     */
    public function removeCommand(\Back\CommandeBundle\Entity\Command $command)
    {
        $this->command->removeElement($command);
    }

    /**
     * Get command
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set caisse
     *
     * @param \Back\CommandeBundle\Entity\Caisse $caisse
     * @return User
     */
    public function setCaisse(\Back\CommandeBundle\Entity\Caisse $caisse = null)
    {
        $this->caisse = $caisse;

        return $this;
    }

    /**
     * Get caisse
     *
     * @return \Back\CommandeBundle\Entity\Caisse 
     */
    public function getCaisse()
    {
        return $this->caisse;
    }

    /**
     * Set category
     *
     * @param \Back\PlanningBundle\Entity\Category $category
     * @return User
     */
    public function setCategory(\Back\PlanningBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Back\PlanningBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add deal
     *
     * @param \Back\DealBundle\Entity\Deal $deal
     * @return User
     */
    public function addDeal(\Back\DealBundle\Entity\Deal $deal)
    {
        $this->deal[] = $deal;

        return $this;
    }

    /**
     * Remove deal
     *
     * @param \Back\DealBundle\Entity\Deal $deal
     */
    public function removeDeal(\Back\DealBundle\Entity\Deal $deal)
    {
        $this->deal->removeElement($deal);
    }

    /**
     * Get deal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Add operation
     *
     * @param \Back\CommandeBundle\Entity\Operation $operation
     * @return User
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

    /**
     * Set localite
     *
     * @param \Back\CommandeBundle\Entity\Localite $localite
     * @return User
     */
    public function setLocalite(\Back\CommandeBundle\Entity\Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \Back\CommandeBundle\Entity\Localite 
     */
    public function getLocalite()
    {
        return $this->localite;
    }
    
    
    public function __toString()
{
    return $this->getName();
}





}
