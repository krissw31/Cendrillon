<?php
namespace CendrillonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity()
 */
class Admin extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
}