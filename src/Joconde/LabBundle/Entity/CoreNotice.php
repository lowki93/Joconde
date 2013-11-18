<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreNotice
 *
 * @ORM\Table(name="core_notice")
 * @ORM\Entity(repositoryClass="Joconde\LabBundle\Entity\CoreNoticeRepository")
 */
class CoreNotice
{

    public function __construct()
    {
        $this->terms = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="core_notice_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=20, nullable=true)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="adpt", type="text", nullable=true)
     */
    private $adpt;

    /**
     * @var string
     *
     * @ORM\Column(name="appl", type="string", length=1024, nullable=true)
     */
    private $appl;

    /**
     * @var string
     *
     * @ORM\Column(name="aptn", type="text", nullable=true)
     */
    private $aptn;

    /**
     * @var string
     *
     * @ORM\Column(name="attr", type="text", nullable=true)
     */
    private $attr;

    /**
     * @var string
     *
     * @ORM\Column(name="autr", type="string", length=1024, nullable=true)
     */
    private $autr;

    /**
     * @var string
     *
     * @ORM\Column(name="bibl", type="text", nullable=true)
     */
    private $bibl;

    /**
     * @var string
     *
     * @ORM\Column(name="comm", type="text", nullable=true)
     */
    private $comm;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=1024, nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="coor", type="string", length=1024, nullable=true)
     */
    private $coor;

    /**
     * @var string
     *
     * @ORM\Column(name="copy", type="string", length=1024, nullable=true)
     */
    private $copy;

    /**
     * @var string
     *
     * @ORM\Column(name="dacq", type="string", length=1024, nullable=true)
     */
    private $dacq;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=512, nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="dation", type="string", length=512, nullable=true)
     */
    private $dation;

    /**
     * @var string
     *
     * @ORM\Column(name="ddpt", type="string", length=512, nullable=true)
     */
    private $ddpt;

    /**
     * @var string
     *
     * @ORM\Column(name="decv", type="string", length=1024, nullable=true)
     */
    private $decv;

    /**
     * @var string
     *
     * @ORM\Column(name="deno", type="string", length=1024, nullable=true)
     */
    private $deno;

    /**
     * @var string
     *
     * @ORM\Column(name="depo", type="string", length=1024, nullable=true)
     */
    private $depo;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="text", nullable=true)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="desy", type="string", length=512, nullable=true)
     */
    private $desy;

    /**
     * @var string
     *
     * @ORM\Column(name="dims", type="string", length=2048, nullable=true)
     */
    private $dims;

    /**
     * @var string
     *
     * @ORM\Column(name="domn", type="string", length=512, nullable=true)
     */
    private $domn;

    /**
     * @var string
     *
     * @ORM\Column(name="drep", type="string", length=1024, nullable=true)
     */
    private $drep;

    /**
     * @var string
     *
     * @ORM\Column(name="ecol", type="string", length=512, nullable=true)
     */
    private $ecol;

    /**
     * @var string
     *
     * @ORM\Column(name="epoq", type="string", length=512, nullable=true)
     */
    private $epoq;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="text", nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="expo", type="text", nullable=true)
     */
    private $expo;

    /**
     * @var string
     *
     * @ORM\Column(name="gene", type="string", length=1024, nullable=true)
     */
    private $gene;

    /**
     * @var string
     *
     * @ORM\Column(name="geohi", type="string", length=1024, nullable=true)
     */
    private $geohi;

    /**
     * @var string
     *
     * @ORM\Column(name="hist", type="text", nullable=true)
     */
    private $hist;

    /**
     * @var boolean
     *
     * @ORM\Column(name="image", type="boolean", nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="insc", type="string", length=1024, nullable=true)
     */
    private $insc;

    /**
     * @var string
     *
     * @ORM\Column(name="inv", type="string", length=2048, nullable=true)
     */
    private $inv;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=512, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="labo", type="string", length=1024, nullable=true)
     */
    private $labo;

    /**
     * @var string
     *
     * @ORM\Column(name="lieux", type="string", length=1024, nullable=true)
     */
    private $lieux;

    /**
     * @var string
     *
     * @ORM\Column(name="loca", type="string", length=512, nullable=true)
     */
    private $loca;

    /**
     * @var string
     *
     * @ORM\Column(name="loca2", type="string", length=512, nullable=true)
     */
    private $loca2;

    /**
     * @var string
     *
     * @ORM\Column(name="mill", type="string", length=512, nullable=true)
     */
    private $mill;

    /**
     * @var string
     *
     * @ORM\Column(name="milu", type="string", length=512, nullable=true)
     */
    private $milu;

    /**
     * @var string
     *
     * @ORM\Column(name="mosa", type="string", length=512, nullable=true)
     */
    private $mosa;

    /**
     * @var string
     *
     * @ORM\Column(name="msgcom", type="text", nullable=true)
     */
    private $msgcom;

    /**
     * @var string
     *
     * @ORM\Column(name="museo", type="string", length=512, nullable=true)
     */
    private $museo;

    /**
     * @var string
     *
     * @ORM\Column(name="nsda", type="string", length=512, nullable=true)
     */
    private $nsda;

    /**
     * @var string
     *
     * @ORM\Column(name="onom", type="text", nullable=true)
     */
    private $onom;

    /**
     * @var string
     *
     * @ORM\Column(name="paut", type="text", nullable=true)
     */
    private $paut;

    /**
     * @var string
     *
     * @ORM\Column(name="pdat", type="text", nullable=true)
     */
    private $pdat;

    /**
     * @var string
     *
     * @ORM\Column(name="pdec", type="text", nullable=true)
     */
    private $pdec;

    /**
     * @var string
     *
     * @ORM\Column(name="peoc", type="string", length=512, nullable=true)
     */
    private $peoc;

    /**
     * @var string
     *
     * @ORM\Column(name="peri", type="string", length=512, nullable=true)
     */
    private $peri;

    /**
     * @var string
     *
     * @ORM\Column(name="peru", type="string", length=1024, nullable=true)
     */
    private $peru;

    /**
     * @var string
     *
     * @ORM\Column(name="phot", type="string", length=1024, nullable=true)
     */
    private $phot;

    /**
     * @var string
     *
     * @ORM\Column(name="pins", type="text", nullable=true)
     */
    private $pins;

    /**
     * @var string
     *
     * @ORM\Column(name="plieux", type="text", nullable=true)
     */
    private $plieux;

    /**
     * @var string
     *
     * @ORM\Column(name="prep", type="text", nullable=true)
     */
    private $prep;

    /**
     * @var string
     *
     * @ORM\Column(name="puti", type="text", nullable=true)
     */
    private $puti;

    /**
     * @var string
     *
     * @ORM\Column(name="reda", type="string", length=1024, nullable=true)
     */
    private $reda;

    /**
     * @var string
     *
     * @ORM\Column(name="refim", type="string", length=2048, nullable=true)
     */
    private $refim;

    /**
     * @var string
     *
     * @ORM\Column(name="repr", type="text", nullable=true)
     */
    private $repr;

    /**
     * @var string
     *
     * @ORM\Column(name="srep", type="string", length=1024, nullable=true)
     */
    private $srep;

    /**
     * @var string
     *
     * @ORM\Column(name="stat", type="string", length=1024, nullable=true)
     */
    private $stat;

    /**
     * @var string
     *
     * @ORM\Column(name="tech", type="string", length=2048, nullable=true)
     */
    private $tech;

    /**
     * @var string
     *
     * @ORM\Column(name="tico", type="text", nullable=true)
     */
    private $tico;

    /**
     * @var string
     *
     * @ORM\Column(name="titr", type="text", nullable=true)
     */
    private $titr;

    /**
     * @var string
     *
     * @ORM\Column(name="util", type="string", length=1024, nullable=true)
     */
    private $util;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=2048, nullable=true)
     */
    private $video;

    /**
     * @var string
     *
     * @ORM\Column(name="www", type="string", length=512, nullable=true)
     */
    private $www;

    /**
     * @ORM\ManyToMany(targetEntity="Joconde\LabBundle\Entity\CoreTerm", inversedBy="notices")
     * @ORM\JoinTable(name="core_noticeterm",
     *      joinColumns={@ORM\JoinColumn(name="notice_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="term_id", referencedColumnName="id")}
     * )
     */
    private $terms;

    /**
    *@ORM\OneToMany(targetEntity="Joconde\LabBundle\Entity\CoreNoticeimage", mappedBy="notice")
    */
    private $noticeImage;

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
     * Set ref
     *
     * @param string $ref
     * @return CoreNotice
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    
        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set adpt
     *
     * @param string $adpt
     * @return CoreNotice
     */
    public function setAdpt($adpt)
    {
        $this->adpt = $adpt;
    
        return $this;
    }

    /**
     * Get adpt
     *
     * @return string 
     */
    public function getAdpt()
    {
        return $this->adpt;
    }

    /**
     * Set appl
     *
     * @param string $appl
     * @return CoreNotice
     */
    public function setAppl($appl)
    {
        $this->appl = $appl;
    
        return $this;
    }

    /**
     * Get appl
     *
     * @return string 
     */
    public function getAppl()
    {
        return $this->appl;
    }

    /**
     * Set aptn
     *
     * @param string $aptn
     * @return CoreNotice
     */
    public function setAptn($aptn)
    {
        $this->aptn = $aptn;
    
        return $this;
    }

    /**
     * Get aptn
     *
     * @return string 
     */
    public function getAptn()
    {
        return $this->aptn;
    }

    /**
     * Set attr
     *
     * @param string $attr
     * @return CoreNotice
     */
    public function setAttr($attr)
    {
        $this->attr = $attr;
    
        return $this;
    }

    /**
     * Get attr
     *
     * @return string 
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * Set autr
     *
     * @param string $autr
     * @return CoreNotice
     */
    public function setAutr($autr)
    {
        $this->autr = $autr;
    
        return $this;
    }

    /**
     * Get autr
     *
     * @return string 
     */
    public function getAutr()
    {
        return $this->autr;
    }

    /**
     * Set bibl
     *
     * @param string $bibl
     * @return CoreNotice
     */
    public function setBibl($bibl)
    {
        $this->bibl = $bibl;
    
        return $this;
    }

    /**
     * Get bibl
     *
     * @return string 
     */
    public function getBibl()
    {
        return $this->bibl;
    }

    /**
     * Set comm
     *
     * @param string $comm
     * @return CoreNotice
     */
    public function setComm($comm)
    {
        $this->comm = $comm;
    
        return $this;
    }

    /**
     * Get comm
     *
     * @return string 
     */
    public function getComm()
    {
        return $this->comm;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return CoreNotice
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set coor
     *
     * @param string $coor
     * @return CoreNotice
     */
    public function setCoor($coor)
    {
        $this->coor = $coor;
    
        return $this;
    }

    /**
     * Get coor
     *
     * @return string 
     */
    public function getCoor()
    {
        return $this->coor;
    }

    /**
     * Set copy
     *
     * @param string $copy
     * @return CoreNotice
     */
    public function setCopy($copy)
    {
        $this->copy = $copy;
    
        return $this;
    }

    /**
     * Get copy
     *
     * @return string 
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * Set dacq
     *
     * @param string $dacq
     * @return CoreNotice
     */
    public function setDacq($dacq)
    {
        $this->dacq = $dacq;
    
        return $this;
    }

    /**
     * Get dacq
     *
     * @return string 
     */
    public function getDacq()
    {
        return $this->dacq;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return CoreNotice
     */
    public function setData($data)
    {
        $this->data = $data;
    
        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set dation
     *
     * @param string $dation
     * @return CoreNotice
     */
    public function setDation($dation)
    {
        $this->dation = $dation;
    
        return $this;
    }

    /**
     * Get dation
     *
     * @return string 
     */
    public function getDation()
    {
        return $this->dation;
    }

    /**
     * Set ddpt
     *
     * @param string $ddpt
     * @return CoreNotice
     */
    public function setDdpt($ddpt)
    {
        $this->ddpt = $ddpt;
    
        return $this;
    }

    /**
     * Get ddpt
     *
     * @return string 
     */
    public function getDdpt()
    {
        return $this->ddpt;
    }

    /**
     * Set decv
     *
     * @param string $decv
     * @return CoreNotice
     */
    public function setDecv($decv)
    {
        $this->decv = $decv;
    
        return $this;
    }

    /**
     * Get decv
     *
     * @return string 
     */
    public function getDecv()
    {
        return $this->decv;
    }

    /**
     * Set deno
     *
     * @param string $deno
     * @return CoreNotice
     */
    public function setDeno($deno)
    {
        $this->deno = $deno;
    
        return $this;
    }

    /**
     * Get deno
     *
     * @return string 
     */
    public function getDeno()
    {
        return $this->deno;
    }

    /**
     * Set depo
     *
     * @param string $depo
     * @return CoreNotice
     */
    public function setDepo($depo)
    {
        $this->depo = $depo;
    
        return $this;
    }

    /**
     * Get depo
     *
     * @return string 
     */
    public function getDepo()
    {
        return $this->depo;
    }

    /**
     * Set desc
     *
     * @param string $desc
     * @return CoreNotice
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    
        return $this;
    }

    /**
     * Get desc
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set desy
     *
     * @param string $desy
     * @return CoreNotice
     */
    public function setDesy($desy)
    {
        $this->desy = $desy;
    
        return $this;
    }

    /**
     * Get desy
     *
     * @return string 
     */
    public function getDesy()
    {
        return $this->desy;
    }

    /**
     * Set dims
     *
     * @param string $dims
     * @return CoreNotice
     */
    public function setDims($dims)
    {
        $this->dims = $dims;
    
        return $this;
    }

    /**
     * Get dims
     *
     * @return string 
     */
    public function getDims()
    {
        return $this->dims;
    }

    /**
     * Set domn
     *
     * @param string $domn
     * @return CoreNotice
     */
    public function setDomn($domn)
    {
        $this->domn = $domn;
    
        return $this;
    }

    /**
     * Get domn
     *
     * @return string 
     */
    public function getDomn()
    {
        return $this->domn;
    }

    /**
     * Set drep
     *
     * @param string $drep
     * @return CoreNotice
     */
    public function setDrep($drep)
    {
        $this->drep = $drep;
    
        return $this;
    }

    /**
     * Get drep
     *
     * @return string 
     */
    public function getDrep()
    {
        return $this->drep;
    }

    /**
     * Set ecol
     *
     * @param string $ecol
     * @return CoreNotice
     */
    public function setEcol($ecol)
    {
        $this->ecol = $ecol;
    
        return $this;
    }

    /**
     * Get ecol
     *
     * @return string 
     */
    public function getEcol()
    {
        return $this->ecol;
    }

    /**
     * Set epoq
     *
     * @param string $epoq
     * @return CoreNotice
     */
    public function setEpoq($epoq)
    {
        $this->epoq = $epoq;
    
        return $this;
    }

    /**
     * Get epoq
     *
     * @return string 
     */
    public function getEpoq()
    {
        return $this->epoq;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return CoreNotice
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set expo
     *
     * @param string $expo
     * @return CoreNotice
     */
    public function setExpo($expo)
    {
        $this->expo = $expo;
    
        return $this;
    }

    /**
     * Get expo
     *
     * @return string 
     */
    public function getExpo()
    {
        return $this->expo;
    }

    /**
     * Set gene
     *
     * @param string $gene
     * @return CoreNotice
     */
    public function setGene($gene)
    {
        $this->gene = $gene;
    
        return $this;
    }

    /**
     * Get gene
     *
     * @return string 
     */
    public function getGene()
    {
        return $this->gene;
    }

    /**
     * Set geohi
     *
     * @param string $geohi
     * @return CoreNotice
     */
    public function setGeohi($geohi)
    {
        $this->geohi = $geohi;
    
        return $this;
    }

    /**
     * Get geohi
     *
     * @return string 
     */
    public function getGeohi()
    {
        return $this->geohi;
    }

    /**
     * Set hist
     *
     * @param string $hist
     * @return CoreNotice
     */
    public function setHist($hist)
    {
        $this->hist = $hist;
    
        return $this;
    }

    /**
     * Get hist
     *
     * @return string 
     */
    public function getHist()
    {
        return $this->hist;
    }

    /**
     * Set image
     *
     * @param boolean $image
     * @return CoreNotice
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return boolean 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set insc
     *
     * @param string $insc
     * @return CoreNotice
     */
    public function setInsc($insc)
    {
        $this->insc = $insc;
    
        return $this;
    }

    /**
     * Get insc
     *
     * @return string 
     */
    public function getInsc()
    {
        return $this->insc;
    }

    /**
     * Set inv
     *
     * @param string $inv
     * @return CoreNotice
     */
    public function setInv($inv)
    {
        $this->inv = $inv;
    
        return $this;
    }

    /**
     * Get inv
     *
     * @return string 
     */
    public function getInv()
    {
        return $this->inv;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return CoreNotice
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
     * Set labo
     *
     * @param string $labo
     * @return CoreNotice
     */
    public function setLabo($labo)
    {
        $this->labo = $labo;
    
        return $this;
    }

    /**
     * Get labo
     *
     * @return string 
     */
    public function getLabo()
    {
        return $this->labo;
    }

    /**
     * Set lieux
     *
     * @param string $lieux
     * @return CoreNotice
     */
    public function setLieux($lieux)
    {
        $this->lieux = $lieux;
    
        return $this;
    }

    /**
     * Get lieux
     *
     * @return string 
     */
    public function getLieux()
    {
        return $this->lieux;
    }

    /**
     * Set loca
     *
     * @param string $loca
     * @return CoreNotice
     */
    public function setLoca($loca)
    {
        $this->loca = $loca;
    
        return $this;
    }

    /**
     * Get loca
     *
     * @return string 
     */
    public function getLoca()
    {
        return $this->loca;
    }

    /**
     * Set loca2
     *
     * @param string $loca2
     * @return CoreNotice
     */
    public function setLoca2($loca2)
    {
        $this->loca2 = $loca2;
    
        return $this;
    }

    /**
     * Get loca2
     *
     * @return string 
     */
    public function getLoca2()
    {
        return $this->loca2;
    }

    /**
     * Set mill
     *
     * @param string $mill
     * @return CoreNotice
     */
    public function setMill($mill)
    {
        $this->mill = $mill;
    
        return $this;
    }

    /**
     * Get mill
     *
     * @return string 
     */
    public function getMill()
    {
        return $this->mill;
    }

    /**
     * Set milu
     *
     * @param string $milu
     * @return CoreNotice
     */
    public function setMilu($milu)
    {
        $this->milu = $milu;
    
        return $this;
    }

    /**
     * Get milu
     *
     * @return string 
     */
    public function getMilu()
    {
        return $this->milu;
    }

    /**
     * Set mosa
     *
     * @param string $mosa
     * @return CoreNotice
     */
    public function setMosa($mosa)
    {
        $this->mosa = $mosa;
    
        return $this;
    }

    /**
     * Get mosa
     *
     * @return string 
     */
    public function getMosa()
    {
        return $this->mosa;
    }

    /**
     * Set msgcom
     *
     * @param string $msgcom
     * @return CoreNotice
     */
    public function setMsgcom($msgcom)
    {
        $this->msgcom = $msgcom;
    
        return $this;
    }

    /**
     * Get msgcom
     *
     * @return string 
     */
    public function getMsgcom()
    {
        return $this->msgcom;
    }

    /**
     * Set museo
     *
     * @param string $museo
     * @return CoreNotice
     */
    public function setMuseo($museo)
    {
        $this->museo = $museo;
    
        return $this;
    }

    /**
     * Get museo
     *
     * @return string 
     */
    public function getMuseo()
    {
        return $this->museo;
    }

    /**
     * Set nsda
     *
     * @param string $nsda
     * @return CoreNotice
     */
    public function setNsda($nsda)
    {
        $this->nsda = $nsda;
    
        return $this;
    }

    /**
     * Get nsda
     *
     * @return string 
     */
    public function getNsda()
    {
        return $this->nsda;
    }

    /**
     * Set onom
     *
     * @param string $onom
     * @return CoreNotice
     */
    public function setOnom($onom)
    {
        $this->onom = $onom;
    
        return $this;
    }

    /**
     * Get onom
     *
     * @return string 
     */
    public function getOnom()
    {
        return $this->onom;
    }

    /**
     * Set paut
     *
     * @param string $paut
     * @return CoreNotice
     */
    public function setPaut($paut)
    {
        $this->paut = $paut;
    
        return $this;
    }

    /**
     * Get paut
     *
     * @return string 
     */
    public function getPaut()
    {
        return $this->paut;
    }

    /**
     * Set pdat
     *
     * @param string $pdat
     * @return CoreNotice
     */
    public function setPdat($pdat)
    {
        $this->pdat = $pdat;
    
        return $this;
    }

    /**
     * Get pdat
     *
     * @return string 
     */
    public function getPdat()
    {
        return $this->pdat;
    }

    /**
     * Set pdec
     *
     * @param string $pdec
     * @return CoreNotice
     */
    public function setPdec($pdec)
    {
        $this->pdec = $pdec;
    
        return $this;
    }

    /**
     * Get pdec
     *
     * @return string 
     */
    public function getPdec()
    {
        return $this->pdec;
    }

    /**
     * Set peoc
     *
     * @param string $peoc
     * @return CoreNotice
     */
    public function setPeoc($peoc)
    {
        $this->peoc = $peoc;
    
        return $this;
    }

    /**
     * Get peoc
     *
     * @return string 
     */
    public function getPeoc()
    {
        return $this->peoc;
    }

    /**
     * Set peri
     *
     * @param string $peri
     * @return CoreNotice
     */
    public function setPeri($peri)
    {
        $this->peri = $peri;
    
        return $this;
    }

    /**
     * Get peri
     *
     * @return string 
     */
    public function getPeri()
    {
        return $this->peri;
    }

    /**
     * Set peru
     *
     * @param string $peru
     * @return CoreNotice
     */
    public function setPeru($peru)
    {
        $this->peru = $peru;
    
        return $this;
    }

    /**
     * Get peru
     *
     * @return string 
     */
    public function getPeru()
    {
        return $this->peru;
    }

    /**
     * Set phot
     *
     * @param string $phot
     * @return CoreNotice
     */
    public function setPhot($phot)
    {
        $this->phot = $phot;
    
        return $this;
    }

    /**
     * Get phot
     *
     * @return string 
     */
    public function getPhot()
    {
        return $this->phot;
    }

    /**
     * Set pins
     *
     * @param string $pins
     * @return CoreNotice
     */
    public function setPins($pins)
    {
        $this->pins = $pins;
    
        return $this;
    }

    /**
     * Get pins
     *
     * @return string 
     */
    public function getPins()
    {
        return $this->pins;
    }

    /**
     * Set plieux
     *
     * @param string $plieux
     * @return CoreNotice
     */
    public function setPlieux($plieux)
    {
        $this->plieux = $plieux;
    
        return $this;
    }

    /**
     * Get plieux
     *
     * @return string 
     */
    public function getPlieux()
    {
        return $this->plieux;
    }

    /**
     * Set prep
     *
     * @param string $prep
     * @return CoreNotice
     */
    public function setPrep($prep)
    {
        $this->prep = $prep;
    
        return $this;
    }

    /**
     * Get prep
     *
     * @return string 
     */
    public function getPrep()
    {
        return $this->prep;
    }

    /**
     * Set puti
     *
     * @param string $puti
     * @return CoreNotice
     */
    public function setPuti($puti)
    {
        $this->puti = $puti;
    
        return $this;
    }

    /**
     * Get puti
     *
     * @return string 
     */
    public function getPuti()
    {
        return $this->puti;
    }

    /**
     * Set reda
     *
     * @param string $reda
     * @return CoreNotice
     */
    public function setReda($reda)
    {
        $this->reda = $reda;
    
        return $this;
    }

    /**
     * Get reda
     *
     * @return string 
     */
    public function getReda()
    {
        return $this->reda;
    }

    /**
     * Set refim
     *
     * @param string $refim
     * @return CoreNotice
     */
    public function setRefim($refim)
    {
        $this->refim = $refim;
    
        return $this;
    }

    /**
     * Get refim
     *
     * @return string 
     */
    public function getRefim()
    {
        return $this->refim;
    }

    /**
     * Set repr
     *
     * @param string $repr
     * @return CoreNotice
     */
    public function setRepr($repr)
    {
        $this->repr = $repr;
    
        return $this;
    }

    /**
     * Get repr
     *
     * @return string 
     */
    public function getRepr()
    {
        return $this->repr;
    }

    /**
     * Set srep
     *
     * @param string $srep
     * @return CoreNotice
     */
    public function setSrep($srep)
    {
        $this->srep = $srep;
    
        return $this;
    }

    /**
     * Get srep
     *
     * @return string 
     */
    public function getSrep()
    {
        return $this->srep;
    }

    /**
     * Set stat
     *
     * @param string $stat
     * @return CoreNotice
     */
    public function setStat($stat)
    {
        $this->stat = $stat;
    
        return $this;
    }

    /**
     * Get stat
     *
     * @return string 
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * Set tech
     *
     * @param string $tech
     * @return CoreNotice
     */
    public function setTech($tech)
    {
        $this->tech = $tech;
    
        return $this;
    }

    /**
     * Get tech
     *
     * @return string 
     */
    public function getTech()
    {
        return $this->tech;
    }

    /**
     * Set tico
     *
     * @param string $tico
     * @return CoreNotice
     */
    public function setTico($tico)
    {
        $this->tico = $tico;
    
        return $this;
    }

    /**
     * Get tico
     *
     * @return string 
     */
    public function getTico()
    {
        return $this->tico;
    }

    /**
     * Set titr
     *
     * @param string $titr
     * @return CoreNotice
     */
    public function setTitr($titr)
    {
        $this->titr = $titr;
    
        return $this;
    }

    /**
     * Get titr
     *
     * @return string 
     */
    public function getTitr()
    {
        return $this->titr;
    }

    /**
     * Set util
     *
     * @param string $util
     * @return CoreNotice
     */
    public function setUtil($util)
    {
        $this->util = $util;
    
        return $this;
    }

    /**
     * Get util
     *
     * @return string 
     */
    public function getUtil()
    {
        return $this->util;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return CoreNotice
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set www
     *
     * @param string $www
     * @return CoreNotice
     */
    public function setWww($www)
    {
        $this->www = $www;
    
        return $this;
    }

    /**
     * Get www
     *
     * @return string 
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * Add terms
     *
     * @param \Joconde\LabBundle\Entity\CoreTerm $terms
     * @return CoreNotice
     */
    public function addTerm(\Joconde\LabBundle\Entity\CoreTerm $terms)
    {
        $this->terms[] = $terms;
    
        return $this;
    }

    /**
     * Remove terms
     *
     * @param \Joconde\LabBundle\Entity\CoreTerm $terms
     */
    public function removeTerm(\Joconde\LabBundle\Entity\CoreTerm $terms)
    {
        $this->terms->removeElement($terms);
    }

    /**
     * Get terms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTerms()
    {
        return $this->terms;
    }


    /**
     * Add noticeImage
     *
     * @param \Joconde\LabBundle\Entity\CoreNoticemage $noticeImage
     * @return CoreNotice
     */
    public function addNoticeImage(\Joconde\LabBundle\Entity\CoreNoticemage $noticeImage)
    {
        $this->noticeImage[] = $noticeImage;
    
        return $this;
    }

    /**
     * Remove noticeImage
     *
     * @param \Joconde\LabBundle\Entity\CoreNoticemage $noticeImage
     */
    public function removeNoticeImage(\Joconde\LabBundle\Entity\CoreNoticemage $noticeImage)
    {
        $this->noticeImage->removeElement($noticeImage);
    }

    /**
     * Get noticeImage
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoticeImage()
    {
        return $this->noticeImage;
    }
}