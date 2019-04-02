<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", indexes={@ORM\Index(name="fk_material_category1_idx", columns={"category_category_id"}), @ORM\Index(name="fk_material_memberaccount1_idx", columns={"memberaccount_id"}), @ORM\Index(name="productmodel", columns={"productmodel"})})
 * @ORM\Entity
 */
class Material
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="productmodel", type="string", length=100, nullable=false)
     */
    private $productmodel;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="builtyear", type="date", nullable=true)
     */
    private $builtyear;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_category_id", referencedColumnName="id")
     * })
     */
    private $categoryCategory;

    /**
     * @var \Memberaccount
     *
     * @ORM\ManyToOne(targetEntity="Memberaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="memberaccount_id", referencedColumnName="id")
     * })
     */
    private $memberaccount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Brand", inversedBy="material")
     * @ORM\JoinTable(name="material_has_brand",
     *   joinColumns={
     *     @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     *   }
     * )
     */
    private $brand;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="material")
     * @ORM\JoinTable(name="material_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->brand = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getProductmodel(): ?string
    {
        return $this->productmodel;
    }

    public function setProductmodel(string $productmodel): self
    {
        $this->productmodel = $productmodel;

        return $this;
    }

    public function getBuiltyear(): ?\DateTimeInterface
    {
        return $this->builtyear;
    }

    public function setBuiltyear(?\DateTimeInterface $builtyear): self
    {
        $this->builtyear = $builtyear;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategoryCategory(): ?Category
    {
        return $this->categoryCategory;
    }

    public function setCategoryCategory(?Category $categoryCategory): self
    {
        $this->categoryCategory = $categoryCategory;

        return $this;
    }

    public function getMemberaccount(): ?Memberaccount
    {
        return $this->memberaccount;
    }

    public function setMemberaccount(?Memberaccount $memberaccount): self
    {
        $this->memberaccount = $memberaccount;

        return $this;
    }

    /**
     * @return Collection|Brand[]
     */
    public function getBrand(): Collection
    {
        return $this->brand;
    }

    public function addBrand(Brand $brand): self
    {
        if (!$this->brand->contains($brand)) {
            $this->brand[] = $brand;
        }

        return $this;
    }

    public function removeBrand(Brand $brand): self
    {
        if ($this->brand->contains($brand)) {
            $this->brand->removeElement($brand);
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tag->contains($tag)) {
            $this->tag->removeElement($tag);
        }

        return $this;
    }

}
