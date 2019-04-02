<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="fk_message_memberaccount_receiver_idx", columns={"memberaccount_receiver_id"}), @ORM\Index(name="fk_message_memberaccount_sender_idx", columns={"memberaccount_sender_id"})})
 * @ORM\Entity
 */
class Message
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=16777215, nullable=true)
     */
    private $content;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_read", type="boolean", nullable=false)
     */
    private $isRead;

    /**
     * @var \Memberaccount
     *
     * @ORM\ManyToOne(targetEntity="Memberaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="memberaccount_receiver_id", referencedColumnName="id")
     * })
     */
    private $memberaccountReceiver;

    /**
     * @var \Memberaccount
     *
     * @ORM\ManyToOne(targetEntity="Memberaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="memberaccount_sender_id", referencedColumnName="id")
     * })
     */
    private $memberaccountSender;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsRead(): ?bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }

    public function getMemberaccountReceiver(): ?Memberaccount
    {
        return $this->memberaccountReceiver;
    }

    public function setMemberaccountReceiver(?Memberaccount $memberaccountReceiver): self
    {
        $this->memberaccountReceiver = $memberaccountReceiver;

        return $this;
    }

    public function getMemberaccountSender(): ?Memberaccount
    {
        return $this->memberaccountSender;
    }

    public function setMemberaccountSender(?Memberaccount $memberaccountSender): self
    {
        $this->memberaccountSender = $memberaccountSender;

        return $this;
    }


}
