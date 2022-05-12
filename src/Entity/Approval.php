<?php

namespace App\Entity;

use App\Repository\ApprovalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApprovalRepository::class)
 */
class Approval
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="approvals")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="approvals")
     */
    private $article_id;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="approvals")
     */
    private $comment_id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_positive;

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

    public function getCommentId(): ?Comment
    {
        return $this->comment_id;
    }

    public function setCommentId(?Comment $comment_id): self
    {
        $this->comment_id = $comment_id;

        return $this;
    }

    public function getIsPositive(): ?bool
    {
        return $this->is_positive;
    }

    public function setIsPositive(?bool $is_positive): self
    {
        $this->is_positive = $is_positive;

        return $this;
    }
}
