<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, mappedBy="classe", cascade={"persist", "remove"})
     */
    private $personnage;

    /**
     * @ORM\OneToMany(targetEntity=Background::class, mappedBy="classe")
     */
    private $backgrounds;

    public function __construct()
    {
        $this->backgrounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): self
    {
        // unset the owning side of the relation if necessary
        if ($personnage === null && $this->personnage !== null) {
            $this->personnage->setClasse(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getClasse() !== $this) {
            $personnage->setClasse($this);
        }

        $this->personnage = $personnage;

        return $this;
    }

    /**
     * @return Collection|Background[]
     */
    public function getBackgrounds(): Collection
    {
        return $this->backgrounds;
    }

    public function addBackground(Background $background): self
    {
        if (!$this->backgrounds->contains($background)) {
            $this->backgrounds[] = $background;
            $background->setClasse($this);
        }

        return $this;
    }

    public function removeBackground(Background $background): self
    {
        if ($this->backgrounds->removeElement($background)) {
            // set the owning side to null (unless already changed)
            if ($background->getClasse() === $this) {
                $background->setClasse(null);
            }
        }

        return $this;
    }
}
