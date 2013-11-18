<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JocondelabUser
 *
 * @ORM\Table(name="jocondelab_user")
 * @ORM\Entity
 */
class JocondelabUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="jocondelab_user_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetimetz", nullable=false)
     */
    private $lastLogin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_superuser", type="boolean", nullable=false)
     */
    private $isSuperuser;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=30, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=30, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=75, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_staff", type="boolean", nullable=false)
     */
    private $isStaff;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_joined", type="datetimetz", nullable=false)
     */
    private $dateJoined;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=2, nullable=false)
     */
    private $language;



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
     * Set password
     *
     * @param string $password
     * @return JocondelabUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return JocondelabUser
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    
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
     * Set isSuperuser
     *
     * @param boolean $isSuperuser
     * @return JocondelabUser
     */
    public function setIsSuperuser($isSuperuser)
    {
        $this->isSuperuser = $isSuperuser;
    
        return $this;
    }

    /**
     * Get isSuperuser
     *
     * @return boolean 
     */
    public function getIsSuperuser()
    {
        return $this->isSuperuser;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return JocondelabUser
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return JocondelabUser
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return JocondelabUser
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return JocondelabUser
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
     * Set isStaff
     *
     * @param boolean $isStaff
     * @return JocondelabUser
     */
    public function setIsStaff($isStaff)
    {
        $this->isStaff = $isStaff;
    
        return $this;
    }

    /**
     * Get isStaff
     *
     * @return boolean 
     */
    public function getIsStaff()
    {
        return $this->isStaff;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return JocondelabUser
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set dateJoined
     *
     * @param \DateTime $dateJoined
     * @return JocondelabUser
     */
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;
    
        return $this;
    }

    /**
     * Get dateJoined
     *
     * @return \DateTime 
     */
    public function getDateJoined()
    {
        return $this->dateJoined;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return JocondelabUser
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
}