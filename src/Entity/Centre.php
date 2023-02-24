<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentreRepository::class)]
class Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomCentre = null;

    #[ORM\Column]
    private ?int $CapaciteCentre = null;

    #[ORM\Column]
    private ?int $NombreBlocCentre = null;

    #[ORM\OneToOne(inversedBy: 'centre', cascade: ['persist', 'remove'])]
    private ?Adresse $Adresse = null;

    #[ORM\OneToMany(mappedBy: 'Centre', targetEntity: PlanningCentre::class)]
    private Collection $planningCentres;

    public function __construct()
    {
        $this->planningCentres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCentre(): ?string
    {
        return $this->NomCentre;
    }

    public function setNomCentre(string $NomCentre): self
    {
        $this->NomCentre = $NomCentre;

        return $this;
    }

    public function getCapaciteCentre(): ?int
    {
        return $this->CapaciteCentre;
    }

    public function setCapaciteCentre(int $CapaciteCentre): self
    {
        $this->CapaciteCentre = $CapaciteCentre;

        return $this;
    }

    public function getNombreBlocCentre(): ?int
    {
        return $this->NombreBlocCentre;
    }

    public function setNombreBlocCentre(int $NombreBlocCentre): self
    {
        $this->NombreBlocCentre = $NombreBlocCentre;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->Adresse;
    }

    public function setAdresse(?Adresse $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * @return Collection<int, PlanningCentre>
     */
    public function getPlanningCentres(): Collection
    {
        return $this->planningCentres;
    }

    public function addPlanningCentre(PlanningCentre $planningCentre): self
    {
        if (!$this->planningCentres->contains($planningCentre)) {
            $this->planningCentres->add($planningCentre);
            $planningCentre->setCentre($this);
        }

        return $this;
    }

    public function removePlanningCentre(PlanningCentre $planningCentre): self
    {
        if ($this->planningCentres->removeElement($planningCentre)) {
            // set the owning side to null (unless already changed)
            if ($planningCentre->getCentre() === $this) {
                $planningCentre->setCentre(null);
            }
        }

        return $this;
    }
}
