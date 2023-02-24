<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomFormateur = null;

    #[ORM\Column(length: 255)]
    private ?string $PrenomFormateur = null;

    #[ORM\Column(length: 255)]
    private ?string $SexeFormateur = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailFormateur = null;

    #[ORM\Column(length: 255)]
    private ?int $NumTelFormateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFormateur(): ?string
    {
        return $this->NomFormateur;
    }

    public function setNomFormateur(string $NomFormateur): self
    {
        $this->NomFormateur = $NomFormateur;

        return $this;
    }

    public function getPrenomFormateur(): ?string
    {
        return $this->PrenomFormateur;
    }

    public function setPrenomFormateur(string $PrenomFormateur): self
    {
        $this->PrenomFormateur = $PrenomFormateur;

        return $this;
    }

    public function getSexeFormateur(): ?string
    {
        return $this->SexeFormateur;
    }

    public function setSexeFormateur(string $SexeFormateur): self
    {
        $this->SexeFormateur = $SexeFormateur;

        return $this;
    }

    public function getEmailFormateur(): ?string
    {
        return $this->EmailFormateur;
    }

    public function setEmailFormateur(string $EmailFormateur): self
    {
        $this->EmailFormateur = $EmailFormateur;

        return $this;
    }

    public function getNumTelFormateur(): ?int
    {
        return $this->NumTelFormateur;
    }

    public function setNumTelFormateur(int $NumTelFormateur): self
    {
        $this->NumTelFormateur = $NumTelFormateur;

        return $this;
    }
}
