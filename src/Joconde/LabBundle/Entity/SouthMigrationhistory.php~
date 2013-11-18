<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SouthMigrationhistory
 *
 * @ORM\Table(name="south_migrationhistory")
 * @ORM\Entity
 */
class SouthMigrationhistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="south_migrationhistory_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="app_name", type="string", length=255, nullable=false)
     */
    private $appName;

    /**
     * @var string
     *
     * @ORM\Column(name="migration", type="string", length=255, nullable=false)
     */
    private $migration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="applied", type="datetimetz", nullable=false)
     */
    private $applied;



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
     * Set appName
     *
     * @param string $appName
     * @return SouthMigrationhistory
     */
    public function setAppName($appName)
    {
        $this->appName = $appName;
    
        return $this;
    }

    /**
     * Get appName
     *
     * @return string 
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * Set migration
     *
     * @param string $migration
     * @return SouthMigrationhistory
     */
    public function setMigration($migration)
    {
        $this->migration = $migration;
    
        return $this;
    }

    /**
     * Get migration
     *
     * @return string 
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * Set applied
     *
     * @param \DateTime $applied
     * @return SouthMigrationhistory
     */
    public function setApplied($applied)
    {
        $this->applied = $applied;
    
        return $this;
    }

    /**
     * Get applied
     *
     * @return \DateTime 
     */
    public function getApplied()
    {
        return $this->applied;
    }
}