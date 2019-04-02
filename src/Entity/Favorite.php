<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favorite
 *
 * @ORM\Table(name="favorite", indexes={@ORM\Index(name="fk_favorite_memberaccount1_idx", columns={"memberaccount_id"}), @ORM\Index(name="fk_favorite_material1_idx", columns={"material_id"})})
 * @ORM\Entity
 */
class Favorite
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
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"comment"="allow user to sort by bookmarking chronology"})
     */
    private $createdAt;

    /**
     * @var \Material
     *
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     * })
     */
    private $material;

    /**
     * @var \Memberaccount
     *
     * @ORM\ManyToOne(targetEntity="Memberaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="memberaccount_id", referencedColumnName="id")
     * })
     */
    private $memberaccount;


}
