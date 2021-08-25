<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chats
 *
 * @ORM\Table(name="chats", indexes={@ORM\Index(name="R_3", columns={"user_from"}), @ORM\Index(name="R_2", columns={"user_to"})})
 * @ORM\Entity
 */
class Chats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message", type="string", length=256, nullable=true)
     */
    private $message;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=true)
     */
    private $datetime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \App\Models\Entities\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_to", referencedColumnName="idK")
     * })
     */
    private $userTo;

    /**
     * @var \App\Models\Entities\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_from", referencedColumnName="idK")
     * })
     */
    private $userFrom;



    /**
     * Get idc.
     *
     * @return int
     */
    public function getIdc()
    {
        return $this->idc;
    }

    /**
     * Set message.
     *
     * @param string|null $message
     *
     * @return Chats
     */
    public function setMessage($message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set datetime.
     *
     * @param \DateTime|null $datetime
     *
     * @return Chats
     */
    public function setDatetime($datetime = null)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime.
     *
     * @return \DateTime|null
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set status.
     *
     * @param int|null $status
     *
     * @return Chats
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set userTo.
     *
     * @param \App\Models\Entities\Korisnici|null $userTo
     *
     * @return Chats
     */
    public function setUserTo(\App\Models\Entities\Korisnici $userTo = null)
    {
        $this->userTo = $userTo;

        return $this;
    }

    /**
     * Get userTo.
     *
     * @return \App\Models\Entities\Korisnici|null
     */
    public function getUserTo()
    {
        return $this->userTo;
    }

    /**
     * Set userFrom.
     *
     * @param \App\Models\Entities\Korisnici|null $userFrom
     *
     * @return Chats
     */
    public function setUserFrom(\App\Models\Entities\Korisnici $userFrom = null)
    {
        $this->userFrom = $userFrom;

        return $this;
    }

    /**
     * Get userFrom.
     *
     * @return \App\Models\Entities\Korisnici|null
     */
    public function getUserFrom()
    {
        return $this->userFrom;
    }
}
