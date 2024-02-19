<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'exercice')]
    private ?Muscle $muscle = null;

    #[ORM\ManyToOne(inversedBy: 'Exercice')]
    private ?Intensity $intensity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $urlPicture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMuscle(): ?Muscle
    {
        return $this->muscle;
    }

    public function setMuscle(?Muscle $muscle): static
    {
        $this->muscle = $muscle;

        return $this;
    }

    public function getIntensity(): ?Intensity
    {
        return $this->intensity;
    }

    public function setIntensity(?Intensity $intensity): static
    {
        $this->intensity = $intensity;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getUrlPicture(): ?string
    {
        return $this->urlPicture;
    }

    public function setUrlPicture(?string $urlPicture): static
    {
        $this->urlPicture = $urlPicture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
