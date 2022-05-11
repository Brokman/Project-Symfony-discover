<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @UniqueEntity("title")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max =50)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_online;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $approved;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $disapproved;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable('now', new DateTimeZone('EUROPE/Paris'));
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlug() : string 
    {
        return (new Slugify())->slugify($this->title);
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

    public function getIsOnline(): ?bool
    {
        return $this->is_online;
    }

    public function setIsOnline(?bool $is_online): self
    {
        $this->online = $is_online;

        return $this;
    }

    public function getApproved(): ?int
    {
        return $this->approved;
    }

    public function setApproved(?int $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getDisapproved(): ?int
    {
        return $this->disapproved;
    }

    public function setDisapproved(?int $disapproved): self
    {
        $this->disapproved = $disapproved;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
