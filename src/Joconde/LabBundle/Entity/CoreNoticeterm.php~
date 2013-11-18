<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreNoticeterm
 *
 * @ORM\Table(name="core_noticeterm")
 * @ORM\Entity
 */
class CoreNoticeterm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="core_noticeterm_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="graph", type="string", length=2048, nullable=true)
     */
    private $graph;

    /**
     * @var \CoreNotice
     *
     * @ORM\ManyToOne(targetEntity="CoreNotice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notice_id", referencedColumnName="id")
     * })
     */
    private $notice;

    /**
     * @var \CoreTerm
     *
     * @ORM\ManyToOne(targetEntity="CoreTerm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="term_id", referencedColumnName="id")
     * })
     */
    private $term;



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
     * Set graph
     *
     * @param string $graph
     * @return CoreNoticeterm
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;
    
        return $this;
    }

    /**
     * Get graph
     *
     * @return string 
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * Set notice
     *
     * @param \Joconde\LabBundle\Entity\CoreNotice $notice
     * @return CoreNoticeterm
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

    /**
     * Set term
     *
     * @param \Joconde\LabBundle\Entity\CoreTerm $term
     * @return CoreNoticeterm
     */
    public function setTerm(\Joconde\LabBundle\Entity\CoreTerm $term = null)
    {
        $this->term = $term;
    
        return $this;
    }

    /**
     * Get term
     *
     * @return \Joconde\LabBundle\Entity\CoreTerm 
     */
    public function getTerm()
    {
        return $this->term;
    }
}