<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 28/06/2017
 * Time: 14:41
 */

namespace CendrillonBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users_online")
 */
class Users_online
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="CendrillonBundle\Entity\User")
     */
    private $ID_user;


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
     * Set iDUser
     *
     * @param \CendrillonBundle\Entity\User $iDUser
     *
     * @return Users_online
     */
    public function setIDUser(\CendrillonBundle\Entity\User $iDUser = null)
    {
        $this->ID_user = $iDUser;

        return $this;
    }

    /**
     * Get iDUser
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getIDUser()
    {
        return $this->ID_user;
    }
}
