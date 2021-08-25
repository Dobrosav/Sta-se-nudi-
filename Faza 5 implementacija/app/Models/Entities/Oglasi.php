<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasi
 *
 * @ORM\Table(name="oglasi", indexes={@ORM\Index(name="R_1", columns={"idK"})})
 * @ORM\Entity(repositoryClass="App\Models\Repositories\OglasiRepository")
 */
class Oglasi
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ido;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=256, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=true)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=true)
     */
    private $isvalid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="string", length=30, nullable=true)
     */
    private $category;

    /**
     * @var \App\Models\Entities\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idK", referencedColumnName="idK",onDelete="CASCADE")
     * })
     */
    private $idk;
    /**
     * @var string
     *
     * @ORM\Column(name="imgurl", type="string", length=200, nullable=false)
     */
    private $imgurl;
    /**
     * Set imgurl.
     *
     * @param string $imgurl
     *
     * @return Oglasi
     */
    public function setImgurl($imgurl)
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    /**
     * Get imgurl.
     *
     * @return string
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }


    /**
     * Get ido.
     *
     * @return int
     */
    public function getIdo()
    {
        return $this->ido;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Oglasi
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text.
     *
     * @param string|null $text
     *
     * @return Oglasi
     */
    public function setText($text = null)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text.
     *
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return Oglasi
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set isvalid.
     *
     * @param bool|null $isvalid
     *
     * @return Oglasi
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
     * Set category.
     *
     * @param string|null $category
     *
     * @return Oglasi
     */
    public function setCategory($category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set idk.
     *
     * @param \App\Models\Entities\Korisnici|null $idk
     *
     * @return Oglasi
     */
    public function setIdk(\App\Models\Entities\Korisnici $idk = null)
    {
        $this->idk = $idk;

        return $this;
    }

    /**
     * Get idk.
     *
     * @return \App\Models\Entities\Korisnici|null
     */
    public function getIdk()
    {
        return $this->idk;
    }
}
