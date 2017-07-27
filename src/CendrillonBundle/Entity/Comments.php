<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 28/06/2017
 * Time: 14:32
 */

namespace CendrillonBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wp_cendrillon_6239_comments")
 */
class Comments // table d'un commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $comment_ID;

    /**
     * @ORM\ManyToOne(targetEntity="CendrillonBundle\Entity\Posts",inversedBy="comment",)
     * @ORM\JoinColumn(nullable=false)
     */
    private $comment_post; //identifiant du post sur lequel est le commentaire


    /**
     * @ORM\ManyToOne(targetEntity="CendrillonBundle\Entity\User", inversedBy="comment")
     */
    private $comment_author;  //c'est l'identifiant de l'utilisateur qui a posté le commentaire.

    /**
     *
     * @ORM\Column(type="bigint")
     */
    private $post_author_id; //identifiant de l'utilisateur qui a posté le post       ///// champs inutil, existe dans post.

    /**
     * @ORM\Column(type="datetime")
     */
    private $comment_date; // date du commentaire

    /**
     * @ORM\Column(type="text")
     */
    private $comment_content; // contenu du commentaire

    /**
     * @ORM\Column(type="boolean")
     */
    private $read_; // boolean si le commentaire a été lu ou non






    /**
     * Get commentID
     *
     * @return integer
     */
    public function getCommentID()
    {
        return $this->comment_ID;
    }

    /**
     * Set postAuthorId
     *
     * @param integer $postAuthorId
     *
     * @return Comments
     */
    public function setPostAuthorId($postAuthorId)
    {
        $this->post_author_id = $postAuthorId;

        return $this;
    }

    /**
     * Get postAuthorId
     *
     * @return integer
     */
    public function getPostAuthorId()
    {
        return $this->post_author_id;
    }

    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     *
     * @return Comments
     */
    public function setCommentDate($commentDate)
    {
        $this->comment_date = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     *
     * @return Comments
     */
    public function setCommentContent($commentContent)
    {
        $this->comment_content = $commentContent;

        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string
     */
    public function getCommentContent()
    {
        return $this->comment_content;
    }

    /**
     * Set read
     *
     * @param boolean $read
     *
     * @return Comments
     */
    public function setRead($read)
    {
        $this->read_ = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean
     */
    public function getRead()
    {
        return $this->read_;
    }

    /**
     * Set commentPost
     *
     * @param \CendrillonBundle\Entity\Posts $commentPost
     *
     * @return Comments
     */
    public function setCommentPost(\CendrillonBundle\Entity\Posts $commentPost)
    {
        $this->comment_post = $commentPost;

        return $this;
    }

    /**
     * Get commentPost
     *
     * @return \CendrillonBundle\Entity\Posts
     */
    public function getCommentPost()
    {
        return $this->comment_post;
    }

    /**
     * Set commentAuthor
     *
     * @param \CendrillonBundle\Entity\User $commentAuthor
     *
     * @return Comments
     */
    public function setCommentAuthor(\CendrillonBundle\Entity\User $commentAuthor = null)
    {
        $this->comment_author = $commentAuthor;

        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getCommentAuthor()
    {
        return $this->comment_author;
    }
}
