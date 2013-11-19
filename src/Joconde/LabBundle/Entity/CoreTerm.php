<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Index;

/**
 * CoreTerm
 *
 * @ORM\Table(name="core_term",indexes={@ORM\index(name="search_idx", columns={"label", "dbpedia_uri"})})
 * @ORM\Entity(repositoryClass="Joconde\LabBundle\Entity\CoreTermRepository")
 */
class CoreTerm
{

    public function __construct()
    {
        $this->notices = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="core_term_id_seq", allocationSize=1, initialValue=1)
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
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=2048, nullable=true)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="normalized_label", type="string", length=1024, nullable=false)
     */
    private $normalizedLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="wp_label", type="string", length=1024, nullable=true)
     */
    private $wpLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="wp_alternative_label", type="string", length=1024, nullable=true)
     */
    private $wpAlternativeLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="wikipedia_url", type="string", length=2048, nullable=true)
     */
    private $wikipediaUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="wikipedia_pageid", type="bigint", nullable=true)
     */
    private $wikipediaPageid;

    /**
     * @var integer
     *
     * @ORM\Column(name="wikipedia_revision_id", type="bigint", nullable=true)
     */
    private $wikipediaRevisionId;

    /**
     * @var string
     *
     * @ORM\Column(name="alternative_wikipedia_url", type="string", length=2048, nullable=true)
     */
    private $alternativeWikipediaUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="alternative_wikipedia_pageid", type="bigint", nullable=true)
     */
    private $alternativeWikipediaPageid;

    /**
     * @var integer
     *
     * @ORM\Column(name="url_status", type="integer", nullable=true)
     */
    private $urlStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="dbpedia_uri", type="string", length=2048, nullable=true)
     */
    private $dbpediaUri;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validated", type="boolean", nullable=false)
     */
    private $validated;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wikipedia_edition", type="boolean", nullable=false)
     */
    private $wikipediaEdition;

    /**
     * @var integer
     *
     * @ORM\Column(name="link_semantic_level", type="integer", nullable=true)
     */
    private $linkSemanticLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_notice", type="integer", nullable=false)
     */
    private $nbNotice;

    /**
     * @var integer
     *
     * @ORM\Column(name="lft", type="integer", nullable=false)
     */
    private $lft;

    /**
     * @var integer
     *
     * @ORM\Column(name="rght", type="integer", nullable=false)
     */
    private $rght;

    /**
     * @var integer
     *
     * @ORM\Column(name="tree_id", type="integer", nullable=false)
     */
    private $treeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var \CoreTerm
     *
     * @ORM\ManyToOne(targetEntity="CoreTerm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var \CoreThesaurus
     *
     * @ORM\ManyToOne(targetEntity="CoreThesaurus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="thesaurus_id", referencedColumnName="id")
     * })
     */
    private $thesaurus;

    /**
     * @var \JocondelabUser
     *
     * @ORM\ManyToOne(targetEntity="JocondelabUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="validator_id", referencedColumnName="id")
     * })
     */
    private $validator;

    /**
     * @ORM\ManyToMany(targetEntity="Joconde\LabBundle\Entity\CoreNotice", mappedBy="terms")
     */
    private $notices;



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
     * @return CoreTerm
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
     * @return CoreTerm
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
     * Set uri
     *
     * @param string $uri
     * @return CoreTerm
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    
        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set normalizedLabel
     *
     * @param string $normalizedLabel
     * @return CoreTerm
     */
    public function setNormalizedLabel($normalizedLabel)
    {
        $this->normalizedLabel = $normalizedLabel;
    
        return $this;
    }

    /**
     * Get normalizedLabel
     *
     * @return string 
     */
    public function getNormalizedLabel()
    {
        return $this->normalizedLabel;
    }

    /**
     * Set wpLabel
     *
     * @param string $wpLabel
     * @return CoreTerm
     */
    public function setWpLabel($wpLabel)
    {
        $this->wpLabel = $wpLabel;
    
        return $this;
    }

    /**
     * Get wpLabel
     *
     * @return string 
     */
    public function getWpLabel()
    {
        return $this->wpLabel;
    }

    /**
     * Set wpAlternativeLabel
     *
     * @param string $wpAlternativeLabel
     * @return CoreTerm
     */
    public function setWpAlternativeLabel($wpAlternativeLabel)
    {
        $this->wpAlternativeLabel = $wpAlternativeLabel;
    
        return $this;
    }

    /**
     * Get wpAlternativeLabel
     *
     * @return string 
     */
    public function getWpAlternativeLabel()
    {
        return $this->wpAlternativeLabel;
    }

    /**
     * Set wikipediaUrl
     *
     * @param string $wikipediaUrl
     * @return CoreTerm
     */
    public function setWikipediaUrl($wikipediaUrl)
    {
        $this->wikipediaUrl = $wikipediaUrl;
    
        return $this;
    }

    /**
     * Get wikipediaUrl
     *
     * @return string 
     */
    public function getWikipediaUrl()
    {
        return $this->wikipediaUrl;
    }

    /**
     * Set wikipediaPageid
     *
     * @param integer $wikipediaPageid
     * @return CoreTerm
     */
    public function setWikipediaPageid($wikipediaPageid)
    {
        $this->wikipediaPageid = $wikipediaPageid;
    
        return $this;
    }

    /**
     * Get wikipediaPageid
     *
     * @return integer 
     */
    public function getWikipediaPageid()
    {
        return $this->wikipediaPageid;
    }

    /**
     * Set wikipediaRevisionId
     *
     * @param integer $wikipediaRevisionId
     * @return CoreTerm
     */
    public function setWikipediaRevisionId($wikipediaRevisionId)
    {
        $this->wikipediaRevisionId = $wikipediaRevisionId;
    
        return $this;
    }

    /**
     * Get wikipediaRevisionId
     *
     * @return integer 
     */
    public function getWikipediaRevisionId()
    {
        return $this->wikipediaRevisionId;
    }

    /**
     * Set alternativeWikipediaUrl
     *
     * @param string $alternativeWikipediaUrl
     * @return CoreTerm
     */
    public function setAlternativeWikipediaUrl($alternativeWikipediaUrl)
    {
        $this->alternativeWikipediaUrl = $alternativeWikipediaUrl;
    
        return $this;
    }

    /**
     * Get alternativeWikipediaUrl
     *
     * @return string 
     */
    public function getAlternativeWikipediaUrl()
    {
        return $this->alternativeWikipediaUrl;
    }

    /**
     * Set alternativeWikipediaPageid
     *
     * @param integer $alternativeWikipediaPageid
     * @return CoreTerm
     */
    public function setAlternativeWikipediaPageid($alternativeWikipediaPageid)
    {
        $this->alternativeWikipediaPageid = $alternativeWikipediaPageid;
    
        return $this;
    }

    /**
     * Get alternativeWikipediaPageid
     *
     * @return integer 
     */
    public function getAlternativeWikipediaPageid()
    {
        return $this->alternativeWikipediaPageid;
    }

    /**
     * Set urlStatus
     *
     * @param integer $urlStatus
     * @return CoreTerm
     */
    public function setUrlStatus($urlStatus)
    {
        $this->urlStatus = $urlStatus;
    
        return $this;
    }

    /**
     * Get urlStatus
     *
     * @return integer 
     */
    public function getUrlStatus()
    {
        return $this->urlStatus;
    }

    /**
     * Set dbpediaUri
     *
     * @param string $dbpediaUri
     * @return CoreTerm
     */
    public function setDbpediaUri($dbpediaUri)
    {
        $this->dbpediaUri = $dbpediaUri;
    
        return $this;
    }

    /**
     * Get dbpediaUri
     *
     * @return string 
     */
    public function getDbpediaUri()
    {
        return $this->dbpediaUri;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     * @return CoreTerm
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;
    
        return $this;
    }

    /**
     * Get validated
     *
     * @return boolean 
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Set wikipediaEdition
     *
     * @param boolean $wikipediaEdition
     * @return CoreTerm
     */
    public function setWikipediaEdition($wikipediaEdition)
    {
        $this->wikipediaEdition = $wikipediaEdition;
    
        return $this;
    }

    /**
     * Get wikipediaEdition
     *
     * @return boolean 
     */
    public function getWikipediaEdition()
    {
        return $this->wikipediaEdition;
    }

    /**
     * Set linkSemanticLevel
     *
     * @param integer $linkSemanticLevel
     * @return CoreTerm
     */
    public function setLinkSemanticLevel($linkSemanticLevel)
    {
        $this->linkSemanticLevel = $linkSemanticLevel;
    
        return $this;
    }

    /**
     * Get linkSemanticLevel
     *
     * @return integer 
     */
    public function getLinkSemanticLevel()
    {
        return $this->linkSemanticLevel;
    }

    /**
     * Set nbNotice
     *
     * @param integer $nbNotice
     * @return CoreTerm
     */
    public function setNbNotice($nbNotice)
    {
        $this->nbNotice = $nbNotice;
    
        return $this;
    }

    /**
     * Get nbNotice
     *
     * @return integer 
     */
    public function getNbNotice()
    {
        return $this->nbNotice;
    }

    /**
     * Set lft
     *
     * @param integer $lft
     * @return CoreTerm
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
    
        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rght
     *
     * @param integer $rght
     * @return CoreTerm
     */
    public function setRght($rght)
    {
        $this->rght = $rght;
    
        return $this;
    }

    /**
     * Get rght
     *
     * @return integer 
     */
    public function getRght()
    {
        return $this->rght;
    }

    /**
     * Set treeId
     *
     * @param integer $treeId
     * @return CoreTerm
     */
    public function setTreeId($treeId)
    {
        $this->treeId = $treeId;
    
        return $this;
    }

    /**
     * Get treeId
     *
     * @return integer 
     */
    public function getTreeId()
    {
        return $this->treeId;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return CoreTerm
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set parent
     *
     * @param \Joconde\LabBundle\Entity\CoreTerm $parent
     * @return CoreTerm
     */
    public function setParent(\Joconde\LabBundle\Entity\CoreTerm $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Joconde\LabBundle\Entity\CoreTerm 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set thesaurus
     *
     * @param \Joconde\LabBundle\Entity\CoreThesaurus $thesaurus
     * @return CoreTerm
     */
    public function setThesaurus(\Joconde\LabBundle\Entity\CoreThesaurus $thesaurus = null)
    {
        $this->thesaurus = $thesaurus;
    
        return $this;
    }

    /**
     * Get thesaurus
     *
     * @return \Joconde\LabBundle\Entity\CoreThesaurus 
     */
    public function getThesaurus()
    {
        return $this->thesaurus;
    }

    /**
     * Set validator
     *
     * @param \Joconde\LabBundle\Entity\JocondelabUser $validator
     * @return CoreTerm
     */
    public function setValidator(\Joconde\LabBundle\Entity\JocondelabUser $validator = null)
    {
        $this->validator = $validator;
    
        return $this;
    }

    /**
     * Get validator
     *
     * @return \Joconde\LabBundle\Entity\JocondelabUser 
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Add notices
     *
     * @param \Joconde\LabBundle\Entity\CoreNotice $notices
     * @return CoreTerm
     */
    public function addNotice(\Joconde\LabBundle\Entity\CoreNotice $notices)
    {
        $this->notices[] = $notices;
    
        return $this;
    }

    /**
     * Remove notices
     *
     * @param \Joconde\LabBundle\Entity\CoreNotice $notices
     */
    public function removeNotice(\Joconde\LabBundle\Entity\CoreNotice $notices)
    {
        $this->notices->removeElement($notices);
    }

    /**
     * Get notices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotices()
    {
        return $this->notices;
    }
}