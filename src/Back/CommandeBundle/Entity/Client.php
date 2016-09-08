<?php

namespace Back\CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Back\CommandeBundle\Entity\ClientRepository")
 */
class Client implements AdvancedUserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=10,nullable=true)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=255)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10,nullable=true)
     */
    private $sex;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datebirth", type="date",nullable=true)
     */
    private $datebirth;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255,nullable=true)
     */
    private $pwd;

    /**
     * @var string
     *
     * @ORM\Column(name="fbid", type="string", length=255,nullable=true)
     */
    private $fbid;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=8,nullable=true)
     */
    private $cin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="stat", type="boolean")
     */
    private $stat;
    /**
     * @var boolean
     *
     * @ORM\Column(name="bigfid", type="integer",nullable=true)
     */
    private $bigFid;
    /**
     * @var integer
     *
     * @ORM\Column(name="exid", type="integer",nullable=true)
     */
    private $exid;
    /**
     * @ORM\OneToMany(targetEntity="Adress", mappedBy="client", cascade={"remove"})
     */
    private $adresses;


    /**
     * @ORM\OneToMany(targetEntity="Command", mappedBy="client", cascade={"remove"})
     */
    private $command;
    /**
     * @ORM\OneToMany(targetEntity="Back\DashBundle\Entity\BigFidHistorique", mappedBy="client", cascade={"remove"})
     */
    private $bigfidhistorique;

    /**
     * @var \DateTime
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    protected $lastLogin;

    /**
     * @var string
     * @ORM\Column(name="confirmation_token", type="string", length=255)
     */
    protected $confirmationToken;

    public function __toString()
    {
        return $this->getName() . " " . $this->getFname();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
		//$this->dcr = new \dateTime();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->command = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bigfidhistorique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name', 'shtumi_ajax_autocomplete', array('entity_alias'=>'clients'))
        ;
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
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getNameFname()
    {
        return $this->name . " " . $this->fname;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->stat;
    }
    public function getRoles()
    {
        return $this->roles;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Client
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        if($password) {
            $this->password = md5($password);

            return $this;
        }

    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Client
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return Client
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }





    /**
     * Set title
     *
     * @param string $title
     * @return Client
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
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
     * Set fname
     *
     * @param string $fname
     * @return Client
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string 
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Client
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set datebirth
     *
     * @param \DateTime $datebirth
     * @return Client
     */
    public function setDatebirth($datebirth)
    {
        $this->datebirth = $datebirth;

        return $this;
    }

    /**
     * Get datebirth
     *
     * @return \DateTime 
     */
    public function getDatebirth()
    {
        return $this->datebirth;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Client
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
     * Set email
     *
     * @param string $email
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     * @return Client
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string 
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set fbid
     *
     * @param integer $fbid
     * @return Client
     */
    public function setFbid($fbid)
    {
        $this->fbid = $fbid;

        return $this;
    }

    /**
     * Get fbid
     *
     * @return integer 
     */
    public function getFbid()
    {
        return $this->fbid;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Client
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
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Client
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
     * Set stat
     *
     * @param boolean $stat
     * @return Client
     */
    public function setStat($stat)
    {
        $this->stat = $stat;

        return $this;
    }

    /**
     * Get stat
     *
     * @return boolean 
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * Set bigFid
     *
     * @param integer $bigFid
     * @return Client
     */
    public function setBigFid($bigFid)
    {
        $this->bigFid = $bigFid;

        return $this;
    }

    /**
     * Get bigFid
     *
     * @return integer 
     */
    public function getBigFid()
    {
        return $this->bigFid;
    }

    /**
     * Set exid
     *
     * @param integer $exid
     * @return Client
     */
    public function setExid($exid)
    {
        $this->exid = $exid;

        return $this;
    }

    /**
     * Get exid
     *
     * @return integer 
     */
    public function getExid()
    {
        return $this->exid;
    }

    /**
     * Add adresses
     *
     * @param \Back\CommandeBundle\Entity\Adress $adresses
     * @return Client
     */
    public function addAdress(\Back\CommandeBundle\Entity\Adress $adresses)
    {
        $this->adresses[] = $adresses;

        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \Back\CommandeBundle\Entity\Adress $adresses
     */
    public function removeAdress(\Back\CommandeBundle\Entity\Adress $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Add command
     *
     * @param \Back\CommandeBundle\Entity\Command $command
     * @return Client
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
     * Add bigfidhistorique
     *
     * @param \Back\DashBundle\Entity\BigFidHistorique $bigfidhistorique
     * @return Client
     */
    public function addBigfidhistorique(\Back\DashBundle\Entity\BigFidHistorique $bigfidhistorique)
    {
        $this->bigfidhistorique[] = $bigfidhistorique;

        return $this;
    }

    /**
     * Remove bigfidhistorique
     *
     * @param \Back\DashBundle\Entity\BigFidHistorique $bigfidhistorique
     */
    public function removeBigfidhistorique(\Back\DashBundle\Entity\BigFidHistorique $bigfidhistorique)
    {
        $this->bigfidhistorique->removeElement($bigfidhistorique);
    }

    /**
     * Get bigfidhistorique
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBigfidhistorique()
    {
        return $this->bigfidhistorique;
    }


    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return Client
     */
    public function setLastLogin(\DateTime $time)
    {
        $this->lastLogin = $time;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return Client
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }
}
