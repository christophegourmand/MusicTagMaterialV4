<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", indexes={@ORM\Index(name="fk_address_city1_idx", columns={"city_id"})})
 * @ORM\Entity
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstline", type="string", length=50, nullable=false)
     */
    private $firstline;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondline", type="string", length=50, nullable=true)
     */
    private $secondline;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstline(): ?string
    {
        return $this->firstline;
    }

    public function setFirstline(string $firstline): self
    {
        $this->firstline = $firstline;

        return $this;
    }

    public function getSecondline(): ?string
    {
        return $this->secondline;
    }

    public function setSecondline(?string $secondline): self
    {
        $this->secondline = $secondline;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }


}
