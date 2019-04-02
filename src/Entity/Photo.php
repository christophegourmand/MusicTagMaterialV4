<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="fk_photo_material1_idx", columns={"material_id"})})
 * @ORM\Entity
 */
class Photo
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
     * @ORM\Column(name="photolink", type="string", length=255, nullable=false)
     */
    private $photolink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="altdescription", type="string", length=100, nullable=true)
     */
    private $altdescription;

    /**
     * @var \Material
     *
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     * })
     */
    private $material;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotolink(): ?string
    {
        return $this->photolink;
    }

    public function setPhotolink(string $photolink): self
    {
        $this->photolink = $photolink;

        return $this;
    }

    public function getAltdescription(): ?string
    {
        return $this->altdescription;
    }

    public function setAltdescription(?string $altdescription): self
    {
        $this->altdescription = $altdescription;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        $this->material = $material;

        return $this;
    }


}
