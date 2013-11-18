<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JocondelabUserUserPermissions
 *
 * @ORM\Table(name="jocondelab_user_user_permissions")
 * @ORM\Entity
 */
class JocondelabUserUserPermissions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="jocondelab_user_user_permissions_id_seq", allocationSize=1, initialValue=1)
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
     * @var \JocondelabUser
     *
     * @ORM\ManyToOne(targetEntity="JocondelabUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * @return JocondelabUserUserPermissions
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
     * Set user
     *
     * @param \Joconde\LabBundle\Entity\JocondelabUser $user
     * @return JocondelabUserUserPermissions
     */
    public function setUser(\Joconde\LabBundle\Entity\JocondelabUser $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Joconde\LabBundle\Entity\JocondelabUser 
     */
    public function getUser()
    {
        return $this->user;
    }
}