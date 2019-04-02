<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tuto
 *
 * @ORM\Table(name="tuto", indexes={@ORM\Index(name="fk_tuto_memberaccount1_idx", columns={"memberaccount_id"})})
 * @ORM\Entity
 */
class Tuto
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
     * @var int|null
     *
     * @ORM\Column(name="author_id", type="integer", nullable=true)
     */
    private $authorId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote;

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
