<?php

namespace App\Entity;

use App\Repository\ReactionPublicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReactionPublicationRepository::class)]
class ReactionPublication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reactionPublications')]
    private ?Publication $Publication = null;

    #[ORM\OneToOne(inversedBy: 'reactionPublication', cascade: ['persist', 'remove'])]
    private ?Utilisateur $Utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'pubReaction')]
    private ?Publication $publication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublication(): ?Publication
    {
        return $this->Publication;
    }

    public function setPublication(?Publication $Publication): self
    {
        $this->Publication = $Publication;

        return $this;
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
}
