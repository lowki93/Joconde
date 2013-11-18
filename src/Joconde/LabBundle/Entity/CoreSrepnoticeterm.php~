<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreSrepnoticeterm
 *
 * @ORM\Table(name="core_srepnoticeterm")
 * @ORM\Entity
 */
class CoreSrepnoticeterm
{
    /**
     * @var \CoreNoticeterm
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CoreNoticeterm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="noticeterm_ptr_id", referencedColumnName="id")
     * })
     */
    private $noticetermPtr;



    /**
     * Set noticetermPtr
     *
     * @param \Joconde\LabBundle\Entity\CoreNoticeterm $noticetermPtr
     * @return CoreSrepnoticeterm
     */
    public function setNoticetermPtr(\Joconde\LabBundle\Entity\CoreNoticeterm $noticetermPtr)
    {
        $this->noticetermPtr = $noticetermPtr;
    
        return $this;
    }

    /**
     * Get noticetermPtr
     *
     * @return \Joconde\LabBundle\Entity\CoreNoticeterm 
     */
    public function getNoticetermPtr()
    {
        return $this->noticetermPtr;
    }
}