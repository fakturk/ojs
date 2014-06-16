<?php

namespace Ojstr\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * User
 * @ExclusionPolicy("all") 
 */
class User implements UserInterface, \Serializable {

    /**
     * @var integer
     * @Expose
     */
    protected $id;

    /**
     * @var string
     * @Expose
     */
    protected $username;

    /**
     * @var string
     * @Expose
     */
    protected $password;

    /**
     * @var string
     * @Expose
     */
    protected $email;

    /**
     * @var boolean
     * @Expose
     *
     */
    protected $isActive;

    /**
     * @var \DateTime
     */
    protected $lastlogin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Expose
     */
    private $roles;

    /**
     * @var integer
     *
     */
    protected $status = 1;

    public function __construct() {
        $this->isActive = true;
        $this->roles = new ArrayCollection();
    }

    public function getRoles() {
        return $this->roles->toArray();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return User
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * @return \DateTime
     */
    public function getLastogin() {
        return $this->lastlogin;
    }

    /**
     * @param \DateTime $lastlogin
     */
    public function setLastlogin(\DateTime $lastlogin) {
        $this->lastlogin = $lastlogin;
    }

    public function getSalt() {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->password
                ) = unserialize($serialized);
    }

    /**
     * Add roles
     *
     * @param \Ojstr\UserBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\Ojstr\UserBundle\Entity\Role $roles) {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Ojstr\UserBundle\Entity\Role $roles
     */
    public function removeRole(\Ojstr\UserBundle\Entity\Role $roles) {
        $this->roles->removeElement($roles);
    }

}
