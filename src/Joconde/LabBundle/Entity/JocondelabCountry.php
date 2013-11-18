<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JocondelabCountry
 *
 * @ORM\Table(name="jocondelab_country")
 * @ORM\Entity
 */
class JocondelabCountry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="jocondelab_country_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dbpedia_uri", type="string", length=2048, nullable=false)
     */
    private $dbpediaUri;

    /**
     * @var string
     *
     * @ORM\Column(name="iso_code_3", type="string", length=3, nullable=false)
     */
    private $isoCode3;

    /**
     * @var string
     *
     * @ORM\Column(name="iso_code_2", type="string", length=2, nullable=false)
     */
    private $isoCode2;



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
     * Set dbpediaUri
     *
     * @param string $dbpediaUri
     * @return JocondelabCountry
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
     * Set isoCode3
     *
     * @param string $isoCode3
     * @return JocondelabCountry
     */
    public function setIsoCode3($isoCode3)
    {
        $this->isoCode3 = $isoCode3;
    
        return $this;
    }

    /**
     * Get isoCode3
     *
     * @return string 
     */
    public function getIsoCode3()
    {
        return $this->isoCode3;
    }

    /**
     * Set isoCode2
     *
     * @param string $isoCode2
     * @return JocondelabCountry
     */
    public function setIsoCode2($isoCode2)
    {
        $this->isoCode2 = $isoCode2;
    
        return $this;
    }

    /**
     * Get isoCode2
     *
     * @return string 
     */
    public function getIsoCode2()
    {
        return $this->isoCode2;
    }
}