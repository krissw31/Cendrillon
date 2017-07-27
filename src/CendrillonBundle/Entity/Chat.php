<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 28/06/2017
 * Time: 14:45
 */

namespace CendrillonBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_chat")
 */
class Chat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="CendrillonBundle\Entity\User", inversedBy="chat")
     */
    private $user_id;

    /**
     * @ORM\OneToOne(targetEntity="CendrillonBundle\Entity\User")
     */
    private $user_send;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $message_lu;




   





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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Chat
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Chat
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set messageLu
     *
     * @param boolean $messageLu
     *
     * @return Chat
     */
    public function setMessageLu($messageLu)
    {
        $this->message_lu = $messageLu;

        return $this;
    }

    /**
     * Get messageLu
     *
     * @return boolean
     */
    public function getMessageLu()
    {
        return $this->message_lu;
    }

    /**
     * Set userId
     *
     * @param \CendrillonBundle\Entity\User $userId
     *
     * @return Chat
     */
    public function setUserId(\CendrillonBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set userSend
     *
     * @param \CendrillonBundle\Entity\User $userSend
     *
     * @return Chat
     */
    public function setUserSend(\CendrillonBundle\Entity\User $userSend = null)
    {
        $this->user_send = $userSend;

        return $this;
    }

    /**
     * Get userSend
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getUserSend()
    {
        return $this->user_send;
    }
}
