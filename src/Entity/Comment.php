<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\JoinColumn(onDelete="CASCADE") 
     * 
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article_id;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\Length(min=2)
     */
    private $commentary;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $posted_at;

    /**
     * @ORM\OneToMany(targetEntity=Approval::class, mappedBy="comment_id")
     */
    private $approvals;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $approve_count;

    public function __construct()
    {
        $this->posted_at = new \DateTimeImmutable('now', new DateTimeZone('EUROPE/Paris'));
        $this->approvals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getArticleId(): ?Article
    {
        return $this->article_id;
    }

    public function setArticleId(?Article $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }

    public function setCommentary(?string $commentary): self
    {
        $this->commentary = $commentary;

        return $this;
    }

    public function getPostedAt(): ?\DateTimeImmutable
    {
        return $this->posted_at;
    }

    public function setPostedAt(\DateTimeImmutable $posted_at): self
    {
        $this->posted_at = $posted_at;

        return $this;
    }

    /**
     * @return Collection<int, Approval>
     */
    public function getApprovals(): Collection
    {
        return $this->approvals;
    }

    public function addApproval(Approval $approval): self
    {
        if (!$this->approvals->contains($approval)) {
            $this->approvals[] = $approval;
            $approval->setCommentId($this);
        }

        return $this;
    }

    public function removeApproval(Approval $approval): self
    {
        if ($this->approvals->removeElement($approval)) {
            // set the owning side to null (unless already changed)
            if ($approval->getCommentId() === $this) {
                $approval->setCommentId(null);
            }
        }

        return $this;
    }

    public function getApproveCount(): ?int
    {
        return $this->approve_count;
    }

    public function setApproveCount(?int $approve_count): self
    {
        $this->approve_count = $approve_count;

        return $this;
    }
}
