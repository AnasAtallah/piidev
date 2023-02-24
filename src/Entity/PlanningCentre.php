<?php

namespace App\Entity;

use App\Repository\PlanningCentreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningCentreRepository::class)]
class PlanningCentre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'planningCentres')]
    private ?Centre $Centre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebutPlanning = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateFinPlanning = null;

    #[ORM\OneToMany(mappedBy: 'Planning', targetEntity: ActiviteCentre::class)]
    private Collection $activiteCentres;

    public function __construct()
    {
        $this->activiteCentres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCentre(): ?Centre
    {
        return $this->Centre;
    }

    public function setCentre(?Centre $Centre): self
    {
        $this->Centre = $Centre;

        return $this;
    }

    public function getDateDebutPlanning(): ?\DateTimeInterface
    {
        return $this->DateDebutPlanning;
    }

    public function setDateDebutPlanning(\DateTimeInterface $DateDebutPlanning): self
    {
        $this->DateDebutPlanning = $DateDebutPlanning;

        return $this;
    }

    public function getDateFinPlanning(): ?\DateTimeInterface
    {
        return $this->DateFinPlanning;
    }

    public function setDateFinPlanning(\DateTimeInterface $DateFinPlanning): self
    {
        $this->DateFinPlanning = $DateFinPlanning;

        return $this;
    }

    /**
     * @return Collection<int, ActiviteCentre>
     */
    public function getActiviteCentres(): Collection
    {
        return $this->activiteCentres;
    }

    public function addActiviteCentre(ActiviteCentre $activiteCentre): self
    {
        if (!$this->activiteCentres->contains($activiteCentre)) {
            $this->activiteCentres->add($activiteCentre);
            $activiteCentre->setPlanning($this);
        }

        return $this;
    }

    public function removeActiviteCentre(ActiviteCentre $activiteCentre): self
    {
        if ($this->activiteCentres->removeElement($activiteCentre)) {
            // set the owning side to null (unless already changed)
            if ($activiteCentre->getPlanning() === $this) {
                $activiteCentre->setPlanning(null);
            }
        }

        return $this;
    }
}
