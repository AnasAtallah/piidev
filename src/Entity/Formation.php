<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomFormation = null;

    #[ORM\Column]
    private ?int $NiveauFormation = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: Utilisateur::class)]
    private Collection $Participant;

    #[ORM\OneToMany(mappedBy: 'Formation', targetEntity: ModuleFormation::class)]
    private Collection $moduleFormations;

    public function __construct()
    {
        $this->Participant = new ArrayCollection();
        $this->moduleFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNiveauFormation(): ?int
    {
        return $this->NiveauFormation;
    }

    public function setNiveauFormation(int $NiveauFormation): self
    {
        $this->NiveauFormation = $NiveauFormation;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getParticipant(): Collection
    {
        return $this->Participant;
    }

    public function addParticipant(Utilisateur $participant): self
    {
        if (!$this->Participant->contains($participant)) {
            $this->Participant->add($participant);
            $participant->setFormation($this);
        }

        return $this;
    }

    public function removeParticipant(Utilisateur $participant): self
    {
        if ($this->Participant->removeElement($participant)) {
            // set the owning side to null (unless already changed)
            if ($participant->getFormation() === $this) {
                $participant->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ModuleFormation>
     */
    public function getModuleFormations(): Collection
    {
        return $this->moduleFormations;
    }

    public function addModuleFormation(ModuleFormation $moduleFormation): self
    {
        if (!$this->moduleFormations->contains($moduleFormation)) {
            $this->moduleFormations->add($moduleFormation);
            $moduleFormation->setFormation($this);
        }

        return $this;
    }

    public function removeModuleFormation(ModuleFormation $moduleFormation): self
    {
        if ($this->moduleFormations->removeElement($moduleFormation)) {
            // set the owning side to null (unless already changed)
            if ($moduleFormation->getFormation() === $this) {
                $moduleFormation->setFormation(null);
            }
        }

        return $this;
    }
}
