<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="brand", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 * @ORM\Entity
 */
class Brand
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photolink", type="string", length=255, nullable=true)
     */
    private $photolink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Material", mappedBy="brand")
     */
    private $material;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->material = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhotolink(): ?string
    {
        return $this->photolink;
    }

    public function setPhotolink(?string $photolink): self
    {
        $this->photolink = $photolink;

        return $this;
    }

    /**
     * @return Collection|Material[]
     */
    public function getMaterial(): Collection
    {
        return $this->material;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->material->contains($material)) {
            $this->material[] = $material;
            $material->addBrand($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        if ($this->material->contains($material)) {
            $this->material->removeElement($material);
            $material->removeBrand($this);
        }

        return $this;
    }

}
