<?php

namespace App\Entity;

use App\Repository\ModuleFormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleFormationRepository::class)]
class ModuleFormation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'moduleFormations')]
    private ?Formation $Formation = null;

    #[ORM\Column(length: 255)]
    private ?string $NomFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $PrerequisModule = null;

    #[ORM\Column(length: 255)]
    private ?string $DureeModule = null;

    #[ORM\Column(length: 255)]
    private ?string $ContenuModule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?Formation
    {
        return $this->Formation;
    }

    public function setFormation(?Formation $Formation): self
    {
        $this->Formation = $Formation;

        return $this;
    }

    public function getNomFormation(): ?string
    {
        return $this->NomFormation;
    }

    public function setNomFormation(string $NomFormation): self
    {
        $this->NomFormation = $NomFormation;

        return $this;
    }

    public function getPrerequisModule(): ?string
    {
        return $this->PrerequisModule;
    }

    public function setPrerequisModule(string $PrerequisModule): self
    {
        $this->PrerequisModule = $PrerequisModule;

        return $this;
    }

    public function getDureeModule(): ?string
    {
        return $this->DureeModule;
    }

    public function setDureeModule(string $DureeModule): self
    {
        $this->DureeModule = $DureeModule;

        return $this;
    }

    public function getContenuModule(): ?string
    {
        return $this->ContenuModule;
    }

    public function setContenuModule(string $ContenuModule): self
    {
        $this->ContenuModule = $ContenuModule;

        return $this;
    }
}
