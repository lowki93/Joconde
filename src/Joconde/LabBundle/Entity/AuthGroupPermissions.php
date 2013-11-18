<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthGroupPermissions
 *
 * @ORM\Table(name="auth_group_permissions")
 * @ORM\Entity
 */
class AuthGroupPermissions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="auth_group_permissions_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \AuthPermission
     *
     * @ORM\ManyToOne(targetEntity="AuthPermission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     * })
     */
    private $permission;

    /**
     * @var \AuthGroup
     *
     * @ORM\ManyToOne(targetEntity="AuthGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;



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
     * Set permission
     *
     * @param \Joconde\LabBundle\Entity\AuthPermission $permission
     * @return AuthGroupPermissions
     */
    public function setPermission(\Joconde\LabBundle\Entity\AuthPermission $permission = null)
    {
        $this->permission = $permission;
    
        return $this;
    }

    /**
     * Get permission
     *
     * @return \Joconde\LabBundle\Entity\AuthPermission 
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Set group
     *
     * @param \Joconde\LabBundle\Entity\AuthGroup $group
     * @return AuthGroupPermissions
     */
    public function setGroup(\Joconde\LabBundle\Entity\AuthGroup $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Joconde\LabBundle\Entity\AuthGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }
}