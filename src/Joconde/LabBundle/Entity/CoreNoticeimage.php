<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreNoticeimage
 *
 * @ORM\Table(name="core_noticeimage")
 * @ORM\Entity
 */
class CoreNoticeimage
{   
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="core_noticeimage_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="relative_url", type="string", length=1024, nullable=false)
     */
    private $relativeUrl;

    /**
     * @var \CoreNotice
     *
     * @ORM\ManyToOne(targetEntity="Joconde\LabBundle\Entity\CoreNotice" , inversedBy="noticeImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notice_id", referencedColumnName="id")
     * })
     */
    private $notice;

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
     * Set relativeUrl
     *
     * @param string $relativeUrl
     * @return CoreNoticeimage
     */
    public function setRelativeUrl($relativeUrl)
    {
        $this->relativeUrl = $relativeUrl;
    
        return $this;
    }

    /**
     * Get relativeUrl
     *
     * @return string 
     */
    public function getRelativeUrl()
    {
        return $this->relativeUrl;
    }

    /**
     * Set notice
     *
     * @param \Joconde\LabBundle\Entity\CoreNotice $notice
     * @return CoreNoticeimage
     */
    public function setNotice(\Joconde\LabBundle\Entity\CoreNotice $notice = null)
    {
        $this->notice = $notice;
    
        return $this;
    }

    /**
     * Get notice
     *
     * @return \Joconde\LabBundle\Entity\CoreNotice 
     */
    public function getNotice()
    {
        return $this->notice;
    }
}