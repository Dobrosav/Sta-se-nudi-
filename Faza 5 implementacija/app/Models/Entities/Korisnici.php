<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Korisnici
 *
 * @ORM\Table(name="korisnici", uniqueConstraints={@ORM\UniqueConstraint(name="mail", columns={"mail"}), @ORM\UniqueConstraint(name="username", columns={"username"})})
 * @ORM\Entity
 */
class Korisnici
{
    /**
     * @var int
     *
     * @ORM\Column(name="idK", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idk;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=true)
     */
    private $isvalid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=25, nullable=true)
     */
    private $surname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=35, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=20, nullable=true)
     */
    private $username;



    /**
     * Get idk.
     *
     * @return int
     */
    public function getIdk()
    {
        return $this->idk;
    }

    /**
     * Set isvalid.
     *
     * @param bool|null $isvalid
     *
     * @return Korisnici
     */
    public function setIsvalid($isvalid = null)
    {
        $this->isvalid = $isvalid;

        return $this;
    }

    /**
     * Get isvalid.
     *
     * @return bool|null
     */
    public function getIsvalid()
    {
        return $this->isvalid;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Korisnici
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname.
     *
     * @param string|null $surname
     *
     * @return Korisnici
     */
    public function setSurname($surname = null)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string|null
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set mail.
     *
     * @param string|null $mail
     *
     * @return Korisnici
     */
    public function setMail($mail = null)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail.
     *
     * @return string|null
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Korisnici
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return Korisnici
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }
}
