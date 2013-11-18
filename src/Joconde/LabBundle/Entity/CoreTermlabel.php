<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreTermlabel
 *
 * @ORM\Table(name="core_termlabel")
 * @ORM\Entity
 */
class CoreTermlabel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="core_termlabel_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=1024, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=128, nullable=true)
     */
    private $lang;

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
     * Set label
     *
     * @param string $label
     * @return CoreTermlabel
     */
    public function setLabel($label)
    {
        $this->label = $label;
    
        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return CoreTermlabel
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    
        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set term
     *
     * @param \Joconde\LabBundle\Entity\CoreTerm $term
     * @return CoreTermlabel
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