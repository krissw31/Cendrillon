<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 28/06/2017
 * Time: 11:32
 */

namespace CendrillonBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wp_cendrillon_6239_posts")
 */
class Posts //table des messages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CendrillonBundle\Entity\User", inversedBy="post")
     */
    private $post_author; //identifiant de l'utilisateur

    /**
     *@ORM\OneToMany(targetEntity="CendrillonBundle\Entity\Comments", mappedBy="comment_post",cascade={"remove"})
     *
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $post_date;

    /**
     * @ORM\Column(type="text")
     */
    private $post_content;

    /**
     * @ORM\Column(type="string")
     */
    private $post_title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $read_;

    /**
     * @ORM\Column(type="string")
     */
    private $categorie;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
    }





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
     * Set postDate
     *
     * @param \DateTime $postDate
     *
     * @return Posts
     */
    public function setPostDate($postDate)
    {
        $this->post_date = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * Set postContent
     *
     * @param string $postContent
     *
     * @return Posts
     */
    public function setPostContent($postContent)
    {
        $this->post_content = $postContent;

        return $this;
    }

    /**
     * Get postContent
     *
     * @return string
     */
    public function getPostContent()
    {
        return $this->post_content;
    }

    /**
     * Set postTitle
     *
     * @param string $postTitle
     *
     * @return Posts
     */
    public function setPostTitle($postTitle)
    {
        $this->post_title = $postTitle;

        return $this;
    }

    /**
     * Get postTitle
     *
     * @return string
     */
    public function getPostTitle()
    {
        return $this->post_title;
    }

    /**
     * Set read
     *
     * @param boolean $read
     *
     * @return Posts
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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Posts
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set postAuthor
     *
     * @param \CendrillonBundle\Entity\User $postAuthor
     *
     * @return Posts
     */
    public function setPostAuthor(\CendrillonBundle\Entity\User $postAuthor = null)
    {
        $this->post_author = $postAuthor;

        return $this;
    }

    /**
     * Get postAuthor
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getPostAuthor()
    {
        return $this->post_author;
    }

    /**
     * Add comment
     *
     * @param \CendrillonBundle\Entity\Comments $comment
     *
     * @return Posts
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
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }
}
