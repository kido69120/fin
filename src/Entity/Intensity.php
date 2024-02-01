<?php

namespace App\Entity;

use App\Repository\IntensityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntensityRepository::class)]
class Intensity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'intensity', targetEntity: Exercice::class)]
    private Collection $Exercice;

    public function __construct()
    {
        $this->Exercice = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Exercice>
     */
    public function getExercice(): Collection
    {
        return $this->Exercice;
    }

    public function addExercice(Exercice $exercice): static
    {
        if (!$this->Exercice->contains($exercice)) {
            $this->Exercice->add($exercice);
            $exercice->setIntensity($this);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): static
    {
        if ($this->Exercice->removeElement($exercice)) {
            // set the owning side to null (unless already changed)
            if ($exercice->getIntensity() === $this) {
                $exercice->setIntensity(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
