<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebutSession = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateFinSession = null;

    #[ORM\Column]
    private ?int $NombreParticipantSession = null;

    #[ORM\Column(length: 255)]
    private ?string $Difficulte = null;

    #[ORM\Column(length: 255)]
    private ?string $DescriptionSession = null;

    #[ORM\OneToMany(mappedBy: 'session', targetEntity: Utilisateur::class)]
    private Collection $Participan;

    public function __construct()
    {
        $this->Participan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutSession(): ?\DateTimeInterface
    {
        return $this->DateDebutSession;
    }

    public function setDateDebutSession(\DateTimeInterface $DateDebutSession): self
    {
        $this->DateDebutSession = $DateDebutSession;

        return $this;
    }

    public function getDateFinSession(): ?\DateTimeInterface
    {
        return $this->DateFinSession;
    }

    public function setDateFinSession(\DateTimeInterface $DateFinSession): self
    {
        $this->DateFinSession = $DateFinSession;

        return $this;
    }

    public function getNombreParticipantSession(): ?int
    {
        return $this->NombreParticipantSession;
    }

    public function setNombreParticipantSession(int $NombreParticipantSession): self
    {
        $this->NombreParticipantSession = $NombreParticipantSession;

        return $this;
    }

    public function getDifficulte(): ?string
    {
        return $this->Difficulte;
    }

    public function setDifficulte(string $Difficulte): self
    {
        $this->Difficulte = $Difficulte;

        return $this;
    }

    public function getDescriptionSession(): ?string
    {
        return $this->DescriptionSession;
    }

    public function setDescriptionSession(string $DescriptionSession): self
    {
        $this->DescriptionSession = $DescriptionSession;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getParticipan(): Collection
    {
        return $this->Participan;
    }

    public function addParticipan(Utilisateur $participan): self
    {
        if (!$this->Participan->contains($participan)) {
            $this->Participan->add($participan);
            $participan->setSession($this);
        }

        return $this;
    }

    public function removeParticipan(Utilisateur $participan): self
    {
        if ($this->Participan->removeElement($participan)) {
            // set the owning side to null (unless already changed)
            if ($participan->getSession() === $this) {
                $participan->setSession(null);
            }
        }

        return $this;
    }
}
