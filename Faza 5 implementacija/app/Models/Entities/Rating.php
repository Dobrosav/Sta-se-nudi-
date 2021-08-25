<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", indexes={@ORM\Index(name="R_4", columns={"idK"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rate", type="integer", nullable=true)
     */
    private $rate;

    /**
     * @var \App\Models\Entities\Korisnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idK", referencedColumnName="idK", onDelete="CASCADE")
     * })
     */
    private $idk;



    /**
     * Get idr.
     *
     * @return int
     */
    public function getIdr()
    {
        return $this->idr;
    }

    /**
     * Set rate.
     *
     * @param int|null $rate
     *
     * @return Rating
     */
    public function setRate($rate = null)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate.
     *
     * @return int|null
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set idk.
     *
     * @param \App\Models\Entities\Korisnici|null $idk
     *
     * @return Rating
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
