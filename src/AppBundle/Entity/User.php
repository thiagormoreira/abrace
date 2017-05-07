<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_user_user_type1_idx", columns={"user_type_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $userType;
    
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contact", inversedBy="user")
     * @ORM\JoinTable(name="user_has_contact",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     *   }
     * )
     */
    private $contact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Credential", inversedBy="user")
     * @ORM\JoinTable(name="user_has_credential",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="credential_id", referencedColumnName="id")
     *   }
     * )
     */
    private $credential;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->credential = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set userType
     *
     * @param \AppBundle\Entity\UserType $userType
     *
     * @return User
     */
    public function setUserType(\AppBundle\Entity\UserType $userType = null)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return \AppBundle\Entity\UserType
     */
    public function getUserType()
    {
        return $this->userType;
    }
    
    /**
     * Set createDate
     *
     * @param datetime $createDate
     *
     * @return User
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
     * @return User
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
     * Add contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return User
     */
    public function addContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \AppBundle\Entity\Contact $contact
     */
    public function removeContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contact->removeElement($contact);
    }

    /**
     * Get contact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Add credential
     *
     * @param \AppBundle\Entity\Credential $credential
     *
     * @return User
     */
    public function addCredential(\AppBundle\Entity\Credential $credential)
    {
        $this->credential[] = $credential;

        return $this;
    }

    /**
     * Remove credential
     *
     * @param \AppBundle\Entity\Credential $credential
     */
    public function removeCredential(\AppBundle\Entity\Credential $credential)
    {
        $this->credential->removeElement($credential);
    }

    /**
     * Get credential
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCredential()
    {
        return $this->credential;
    }
    
}
