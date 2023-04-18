<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OffreDemploiRepository;

/**
 * @ORM\Entity(repositoryClass=OffreDemploiRepository::class)
 */
class OffreDemploi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $contratType;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $horaires;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $mission;

    /**
     * @ORM\Column(type="text")
     */
    private $profilRecherhcer;

    /**
     * @ORM\Column(type="text")
     */
    private $posteAvantage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $region;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getContratType(): ?string
    {
        return $this->contratType;
    }

    public function setContratType(string $contratType): self
    {
        $this->contratType = $contratType;

        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getProfilRecherhcer(): ?string
    {
        return $this->profilRecherhcer;
    }

    public function setProfilRecherhcer(string $profilRecherhcer): self
    {
        $this->profilRecherhcer = $profilRecherhcer;

        return $this;
    }

    public function getPosteAvantage(): ?string
    {
        return $this->posteAvantage;
    }

    public function setPosteAvantage(string $posteAvantage): self
    {
        $this->posteAvantage = $posteAvantage;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }
}
