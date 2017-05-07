<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(name="title",length=45, type="string", nullable=false)
     */
    private $title;
    
    /**
     * @var string
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;
    
    /**
     * @var datetime $createDate
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createDate;
    
    /**
     * @var datetime $editDate
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editDate;
    
    /**
     * @var string
     * @ORM\Column(name="feature_image", type="string", nullable=true)
     */
    private $featureImage;
    
    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $category;
    
    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="post_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status;
    
    /**
     * @var \PostType
     *
     * @ORM\ManyToOne(targetEntity="PostType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_type_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $postType;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set createDate
     *
     * @param datetime $createDate
     *
     * @return Post
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
        
        return $this;
    }
    
    /**
     * Get createDate
     *
     * @return datetime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
    
    /**
     * Set editDate
     *
     * @param datetime $editDate
     *
     * @return Post
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;
        
        return $this;
    }
    
    /**
     * Get editDate
     *
     * @return datetime
     */
    public function getEditDate()
    {
        return $this->editDate;
    }
    
    /**
     * Set featureImage
     *
     * @param string $featureImage
     *
     * @return Post
     */
    public function setFeatureImage($featureImage)
    {
        $this->featureImage = $featureImage;
        
        return $this;
    }
    
    /**
     * Get featureImage
     *
     * @return string
     */
    public function getFeatureImage()
    {
        return $this->featureImage;
    }
    
    /**
     * Set text
     *
     * @param string $text
     *
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;
        
        return $this;
    }
    
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $ category
     *
     * @return Category
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        
        return $this;
    }
    
    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $ user
     *
     * @return Post
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;
        
        return $this;
    }
    
    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Advertisement
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;
        
        return $this;
    }
    
    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }
    
    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * Set status
     *
     * @param string $status
     *
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set postType
     *
     * @param \AppBundle\Entity\PostType $postType
     *
     * @return Post
     */
    public function setPostType(\AppBundle\Entity\PostType $postType = null)
    {
        $this->postType = $postType;
        
        return $this;
    }
    
    /**
     * Get postType
     *
     * @return \AppBundle\Entity\PostType
     */
    public function getPostType()
    {
        return $this->postType;
    }
    
    public function __toString() {
        return $this->text;
        return $this->title;
    }
}

