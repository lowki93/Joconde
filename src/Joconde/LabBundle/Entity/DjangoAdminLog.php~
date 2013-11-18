<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DjangoAdminLog
 *
 * @ORM\Table(name="django_admin_log")
 * @ORM\Entity
 */
class DjangoAdminLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="django_admin_log_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="action_time", type="datetimetz", nullable=false)
     */
    private $actionTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="object_id", type="text", nullable=true)
     */
    private $objectId;

    /**
     * @var string
     *
     * @ORM\Column(name="object_repr", type="string", length=200, nullable=false)
     */
    private $objectRepr;

    /**
     * @var integer
     *
     * @ORM\Column(name="action_flag", type="smallint", nullable=false)
     */
    private $actionFlag;

    /**
     * @var string
     *
     * @ORM\Column(name="change_message", type="text", nullable=false)
     */
    private $changeMessage;

    /**
     * @var \DjangoContentType
     *
     * @ORM\ManyToOne(targetEntity="DjangoContentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="content_type_id", referencedColumnName="id")
     * })
     */
    private $contentType;



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
     * Set actionTime
     *
     * @param \DateTime $actionTime
     * @return DjangoAdminLog
     */
    public function setActionTime($actionTime)
    {
        $this->actionTime = $actionTime;
    
        return $this;
    }

    /**
     * Get actionTime
     *
     * @return \DateTime 
     */
    public function getActionTime()
    {
        return $this->actionTime;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return DjangoAdminLog
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set objectId
     *
     * @param string $objectId
     * @return DjangoAdminLog
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId
     *
     * @return string 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectRepr
     *
     * @param string $objectRepr
     * @return DjangoAdminLog
     */
    public function setObjectRepr($objectRepr)
    {
        $this->objectRepr = $objectRepr;
    
        return $this;
    }

    /**
     * Get objectRepr
     *
     * @return string 
     */
    public function getObjectRepr()
    {
        return $this->objectRepr;
    }

    /**
     * Set actionFlag
     *
     * @param integer $actionFlag
     * @return DjangoAdminLog
     */
    public function setActionFlag($actionFlag)
    {
        $this->actionFlag = $actionFlag;
    
        return $this;
    }

    /**
     * Get actionFlag
     *
     * @return integer 
     */
    public function getActionFlag()
    {
        return $this->actionFlag;
    }

    /**
     * Set changeMessage
     *
     * @param string $changeMessage
     * @return DjangoAdminLog
     */
    public function setChangeMessage($changeMessage)
    {
        $this->changeMessage = $changeMessage;
    
        return $this;
    }

    /**
     * Get changeMessage
     *
     * @return string 
     */
    public function getChangeMessage()
    {
        return $this->changeMessage;
    }

    /**
     * Set contentType
     *
     * @param \Joconde\LabBundle\Entity\DjangoContentType $contentType
     * @return DjangoAdminLog
     */
    public function setContentType(\Joconde\LabBundle\Entity\DjangoContentType $contentType = null)
    {
        $this->contentType = $contentType;
    
        return $this;
    }

    /**
     * Get contentType
     *
     * @return \Joconde\LabBundle\Entity\DjangoContentType 
     */
    public function getContentType()
    {
        return $this->contentType;
    }
}