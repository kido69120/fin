<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
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
}
