<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomRue = null;

    #[ORM\Column]
    private ?int $NumRue = null;

    #[ORM\Column]
    private ?int $CodePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $Gouvernorat = null;

    #[ORM\OneToOne(mappedBy: 'Adresse', cascade: ['persist', 'remove'])]
    private ?Therapist $therapist = null;

    #[ORM\OneToOne(mappedBy: 'Adresse', cascade: ['persist', 'remove'])]
    private ?Organisateur $organisateur = null;

    #[ORM\OneToOne(mappedBy: 'Adresse', cascade: ['persist', 'remove'])]
    private ?Centre $centre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRue(): ?string
    {
        return $this->NomRue;
    }

    public function setNomRue(string $NomRue): self
    {
        $this->NomRue = $NomRue;

        return $this;
    }

    public function getNumRue(): ?int
    {
        return $this->NumRue;
    }

    public function setNumRue(int $NumRue): self
    {
        $this->NumRue = $NumRue;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->CodePostal;
    }

    public function setCodePostal(int $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getGouvernorat(): ?string
    {
        return $this->Gouvernorat;
    }

    public function setGouvernorat(string $Gouvernorat): self
    {
        $this->Gouvernorat = $Gouvernorat;

        return $this;
    }

    public function getTherapist(): ?Therapist
    {
        return $this->therapist;
    }

    public function setTherapist(?Therapist $therapist): self
    {
        // unset the owning side of the relation if necessary
        if ($therapist === null && $this->therapist !== null) {
            $this->therapist->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($therapist !== null && $therapist->getAdresse() !== $this) {
            $therapist->setAdresse($this);
        }

        $this->therapist = $therapist;

        return $this;
    }

    public function getOrganisateur(): ?Organisateur
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Organisateur $organisateur): self
    {
        // unset the owning side of the relation if necessary
        if ($organisateur === null && $this->organisateur !== null) {
            $this->organisateur->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($organisateur !== null && $organisateur->getAdresse() !== $this) {
            $organisateur->setAdresse($this);
        }

        $this->organisateur = $organisateur;

        return $this;
    }

    public function getCentre(): ?Centre
    {
        return $this->centre;
    }

    public function setCentre(?Centre $centre): self
    {
        // unset the owning side of the relation if necessary
        if ($centre === null && $this->centre !== null) {
            $this->centre->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($centre !== null && $centre->getAdresse() !== $this) {
            $centre->setAdresse($this);
        }

        $this->centre = $centre;

        return $this;
    }
}
