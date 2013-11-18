<?php

namespace Joconde\LabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JocondelabUserGroups
 *
 * @ORM\Table(name="jocondelab_user_groups")
 * @ORM\Entity
 */
class JocondelabUserGroups
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="jocondelab_user_groups_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * Set group
     *
     * @param \Joconde\LabBundle\Entity\AuthGroup $group
     * @return JocondelabUserGroups
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

    /**
     * Set user
     *
     * @param \Joconde\LabBundle\Entity\JocondelabUser $user
     * @return JocondelabUserGroups
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