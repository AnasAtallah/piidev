<?php

namespace App\Entity;

use App\Repository\DespenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DespenseRepository::class)]
class Despense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleDespense = null;

    #[ORM\Column(length: 255)]
    private ?float $MontantDespense = null;

    #[ORM\Column]
    private ?float $ReductionDespense = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDespense(): ?string
    {
        return $this->LibelleDespense;
    }

    public function setLibelleDespense(string $LibelleDespense): self
    {
        $this->LibelleDespense = $LibelleDespense;

        return $this;
    }

    public function getMontantDespense(): ?float
    {
        return $this->MontantDespense;
    }

    public function setMontantDespense(float $MontantDespense): self
    {
        $this->MontantDespense = $MontantDespense;

        return $this;
    }

    public function getReductionDespense(): ?float
    {
        return $this->ReductionDespense;
    }

    public function setReductionDespense(float $ReductionDespense): self
    {
        $this->ReductionDespense = $ReductionDespense;

        return $this;
    }
}
