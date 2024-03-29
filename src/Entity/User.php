<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, minMessage="Username must be atleast 4 characters")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, minMessage="Password must be atleast 4 characters")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Password should be the same on confirm")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Password should be the same on password")
     */
    private $confirm_password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_admin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_protected;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="user_id")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user_id")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Approval::class, mappedBy="user_id")
     */
    private $approvals;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->approvals = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(?bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * @return array<Role|string> The user roles
     */
    public function getRoles() 
    {
        if($this->is_admin) {
            return ['ROLE_ADMIN'];
        } else {
            return ['ROLE_USER'];
        }
    }

    /**
     * @return string|null The salt
     */
    public function getSalt() 
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {

    }
    
    /**
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    /**
     * @param string $serialized
     * @return void
     */
    public function unserialize(string $serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized, ['allow_classes' => false]);  
    }

    public function getIsProtected(): ?bool
    {
        return $this->is_protected;
    }

    public function setIsProtected(?bool $is_protected): self
    {
        $this->is_protected = $is_protected;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setUserId($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUserId() === $this) {
                $article->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUserId($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUserId() === $this) {
                $comment->setUserId(null);
            }
        }

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
            $approval->setUserId($this);
        }

        return $this;
    }

    public function removeApproval(Approval $approval): self
    {
        if ($this->approvals->removeElement($approval)) {
            // set the owning side to null (unless already changed)
            if ($approval->getUserId() === $this) {
                $approval->setUserId(null);
            }
        }

        return $this;
    }
}
