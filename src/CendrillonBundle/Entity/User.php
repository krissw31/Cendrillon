<?php
namespace CendrillonBundle\Entity;
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 27/06/2017
 * Time: 17:23
 */
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;


/**
 * @Entity
 * @ORM\Table(name="wp_cendrillon_6239_users")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $ID;

    /**
     * @ORM\Column(type="string",length=30)
     */
    private $user_login;

    /**
     * @ORM\OneToMany(targetEntity="CendrillonBundle\Entity\Comments", mappedBy="comment_author")
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity="CendrillonBundle\Entity\Posts", mappedBy="post_author")
     */
    private $post;

    /**
     * @ORM\OneToOne(targetEntity="CendrillonBundle\Entity\Users_online")
     */
    private $online;

    /**
     * @ORM\OneToMany(targetEntity="CendrillonBundle\Entity\Chat", mappedBy="user_id")
     */
    private $chat;


    /**
     * @ORM\Column(type="string",length=30)
     */
    private $user_pass;

    /**
     * @ORM\Column(type="string")
     */
    private $user_email;

    /**
     * @ORM\Column(type="string")
     */
    private $user_sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $user__registered;


    /**
     * @ORM\Column(type="date")
     */
    private $naissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $message_signale;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\Column(type="date")
     */
    private $last_connexion;

    /**
     * @ORM\Column(type="integer")
     */
    private $avertissement;

    /**
     * @ORM\Column(type="integer")
     */
    private $indice_confiance;

    public function getAge()
    {
        $now = new \DateTime('now');
        $age = $this->getNaissance();
        $difference = $now->diff($age);

        return $difference->format('%yans');
    }

    //----------------
    // METHODES GENEREES
    //----------------


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_login = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chat = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get iD
     *
     * @return integer
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set userLogin
     *
     * @param string $userLogin
     *
     * @return User
     */
    public function setUserLogin($userLogin)
    {
        $this->user_login = $userLogin;

        return $this;
    }

    /**
     * Get userLogin
     *
     * @return string
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * Set userPass
     *
     * @param string $userPass
     *
     * @return User
     */
    public function setUserPass($userPass)
    {
        $this->user_pass = $userPass;

        return $this;
    }

    /**
     * Get userPass
     *
     * @return string
     */
    public function getUserPass()
    {
        return $this->user_pass;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->user_email = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Set userSexe
     *
     * @param string $userSexe
     *
     * @return User
     */
    public function setUserSexe($userSexe)
    {
        $this->user_sexe = $userSexe;

        return $this;
    }

    /**
     * Get userSexe
     *
     * @return string
     */
    public function getUserSexe()
    {
        return $this->user_sexe;
    }

    /**
     * Set userRegistered
     *
     * @param \DateTime $userRegistered
     *
     * @return User
     */
    public function setUserRegistered($userRegistered)
    {
        $this->user__registered = $userRegistered;

        return $this;
    }

    /**
     * Get userRegistered
     *
     * @return \DateTime
     */
    public function getUserRegistered()
    {
        return $this->user__registered;
    }

    /**
     * Set naissance
     *
     * @param \DateTime $naissance
     *
     * @return User
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get naissance
     *
     * @return \DateTime
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set messageSignale
     *
     * @param integer $messageSignale
     *
     * @return User
     */
    public function setMessageSignale($messageSignale)
    {
        $this->message_signale = $messageSignale;

        return $this;
    }

    /**
     * Get messageSignale
     *
     * @return integer
     */
    public function getMessageSignale()
    {
        return $this->message_signale;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return User
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set lastConnexion
     *
     * @param \DateTime $lastConnexion
     *
     * @return User
     */
    public function setLastConnexion($lastConnexion)
    {
        $this->last_connexion = $lastConnexion;

        return $this;
    }

    /**
     * Get lastConnexion
     *
     * @return \DateTime
     */
    public function getLastConnexion()
    {
        return $this->last_connexion;
    }

    /**
     * Set avertissement
     *
     * @param integer $avertissement
     *
     * @return User
     */
    public function setAvertissement($avertissement)
    {
        $this->avertissement = $avertissement;

        return $this;
    }

    /**
     * Get avertissement
     *
     * @return integer
     */
    public function getAvertissement()
    {
        return $this->avertissement;
    }

    /**
     * Set indiceConfiance
     *
     * @param integer $indiceConfiance
     *
     * @return User
     */
    public function setIndiceConfiance($indiceConfiance)
    {
        $this->indice_confiance = $indiceConfiance;

        return $this;
    }

    /**
     * Get indiceConfiance
     *
     * @return integer
     */
    public function getIndiceConfiance()
    {
        return $this->indice_confiance;
    }

    /**
     * Add comment
     *
     * @param \CendrillonBundle\Entity\Comments $comment
     *
     * @return User
     */
    public function addComment(\CendrillonBundle\Entity\Comments $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \CendrillonBundle\Entity\Comments $comment
     */
    public function removeComment(\CendrillonBundle\Entity\Comments $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add post
     *
     * @param \CendrillonBundle\Entity\Posts $post
     *
     * @return User
     */
    public function addPost(\CendrillonBundle\Entity\Posts $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \CendrillonBundle\Entity\Posts $post
     */
    public function removePost(\CendrillonBundle\Entity\Posts $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set online
     *
     * @param \CendrillonBundle\Entity\Users_online $online
     *
     * @return User
     */
    public function setOnline(\CendrillonBundle\Entity\Users_online $online = null)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return \CendrillonBundle\Entity\Users_online
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Add chat
     *
     * @param \CendrillonBundle\Entity\Chat $chat
     *
     * @return User
     */
    public function addChat(\CendrillonBundle\Entity\Chat $chat)
    {
        $this->chat[] = $chat;

        return $this;
    }

    /**
     * Remove chat
     *
     * @param \CendrillonBundle\Entity\Chat $chat
     */
    public function removeChat(\CendrillonBundle\Entity\Chat $chat)
    {
        $this->chat->removeElement($chat);
    }

    /**
     * Get chat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChat()
    {
        return $this->chat;
    }
}
