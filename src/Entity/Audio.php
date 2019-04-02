<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table(name="audio", indexes={@ORM\Index(name="fk_audio_material1_idx", columns={"material_id"})})
 * @ORM\Entity
 */
class Audio
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
     * @ORM\Column(name="audiolink", type="string", length=255, nullable=false)
     */
    private $audiolink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

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

    public function getAudiolink(): ?string
    {
        return $this->audiolink;
    }

    public function setAudiolink(string $audiolink): self
    {
        $this->audiolink = $audiolink;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
