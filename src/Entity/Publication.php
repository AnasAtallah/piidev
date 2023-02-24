<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    private ?Utilisateur $Utilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DatePublication = null;
    
    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:" ce champs est requis")]
    private ?string $ContenuPublication = null;

    #[ORM\OneToMany(mappedBy: 'Publication', targetEntity: CommantairePublication::class)]
    private Collection $commantairePublications;

    #[ORM\OneToMany(mappedBy: 'Publication', targetEntity: ReactionPublication::class)]
    private Collection $reactionPublications;

    #[ORM\OneToMany(mappedBy: 'publication', targetEntity: CommantairePublication::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'publication', targetEntity: Utilisateur::class)]
    private Collection $user;

    #[ORM\OneToMany(mappedBy: 'publication', targetEntity: ReactionPublication::class)]
    private Collection $pubReaction;

    #[ORM\Column(length: 255)]
    private ?string $ImageForum = null;

    public function __construct()
    {
        $this->commantairePublications = new ArrayCollection();
        $this->reactionPublications = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->pubReaction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->DatePublication;
    }

    public function setDatePublication(\DateTimeInterface $DatePublication): self
    {
        $this->DatePublication = $DatePublication;

        return $this;
    }

    public function getContenuPublication(): ?string
    {
        return $this->ContenuPublication;
    }

    public function setContenuPublication(string $ContenuPublication): self
    {
        $this->ContenuPublication = $ContenuPublication;

        return $this;
    }

    /**
     * @return Collection<int, CommantairePublication>
     */
    public function getCommantairePublications(): Collection
    {
        return $this->commantairePublications;
    }

    public function addCommantairePublication(CommantairePublication $commantairePublication): self
    {
        if (!$this->commantairePublications->contains($commantairePublication)) {
            $this->commantairePublications->add($commantairePublication);
            $commantairePublication->setPublication($this);
        }

        return $this;
    }

    public function removeCommantairePublication(CommantairePublication $commantairePublication): self
    {
        if ($this->commantairePublications->removeElement($commantairePublication)) {
            // set the owning side to null (unless already changed)
            if ($commantairePublication->getPublication() === $this) {
                $commantairePublication->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReactionPublication>
     */
    public function getReactionPublications(): Collection
    {
        return $this->reactionPublications;
    }

    public function addReactionPublication(ReactionPublication $reactionPublication): self
    {
        if (!$this->reactionPublications->contains($reactionPublication)) {
            $this->reactionPublications->add($reactionPublication);
            $reactionPublication->setPublication($this);
        }

        return $this;
    }

    public function removeReactionPublication(ReactionPublication $reactionPublication): self
    {
        if ($this->reactionPublications->removeElement($reactionPublication)) {
            // set the owning side to null (unless already changed)
            if ($reactionPublication->getPublication() === $this) {
                $reactionPublication->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CommantairePublication>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(CommantairePublication $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setPublication($this);
        }

        return $this;
    }

    public function removeCommentaire(CommantairePublication $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPublication() === $this) {
                $commentaire->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Utilisateur $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setPublication($this);
        }

        return $this;
    }

    public function removeUser(Utilisateur $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPublication() === $this) {
                $user->setPublication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReactionPublication>
     */
    public function getPubReaction(): Collection
    {
        return $this->pubReaction;
    }

    public function addPubReaction(ReactionPublication $pubReaction): self
    {
        if (!$this->pubReaction->contains($pubReaction)) {
            $this->pubReaction->add($pubReaction);
            $pubReaction->setPublication($this);
        }

        return $this;
    }

    public function removePubReaction(ReactionPublication $pubReaction): self
    {
        if ($this->pubReaction->removeElement($pubReaction)) {
            // set the owning side to null (unless already changed)
            if ($pubReaction->getPublication() === $this) {
                $pubReaction->setPublication(null);
            }
        }

        return $this;
    }


    public function getImageForum(): ?string
    {
        return $this->ImageForum;
    }

    public function setImageForum(string $ImageForum): self
    {
        $this->ImageForum = $ImageForum;

        return $this;
    }
}