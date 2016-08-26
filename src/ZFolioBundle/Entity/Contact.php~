<?php

namespace ZFolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 */
class Contact
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * 
     * @Assert\Length(
     *  min = 2,
     *  max = 100,
     *  minMessage = "La longueur de votre nom doit être compris entre 2 et 100 caractères",
     *  maxMessage = "La longueur de votre nom doit être compris entre 2 et 100 caractères"
     * )
     */
    private $name;

    /**
     * @var string
     * 
     * @Assert\Email(
     *  message = "The email '{{ value }}' is not a valid email.",
     * )
     */
    private $email;

    /**
     * @var string
     * 
     * @Assert\Length(
     *  min = 6,
     *  max = 10000,
     *  minMessage = "La longueur de votre nom doit être compris entre 6 et 10000 caractères",
     *  maxMessage = "La longueur de votre nom doit être compris entre 6 et 10000 caractères"
     * )
     */
    private $message;

    /**
     * @var string
     * 
     * @Assert\Length(
     *  min = 9,
     *  max = 40,
     *  minMessage = "La longueur de votre nom doit être compris entre 9 et 40 caractères",
     *  maxMessage = "La longueur de votre nom doit être compris entre 9 et 40 caractères"
     * )
     * 
     */
    private $phone;

    /**
     * @var \DateTime
     */
    private $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
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
     * @return Contact
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
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Contact
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

}
