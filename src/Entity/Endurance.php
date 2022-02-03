<?php

namespace App\Entity;

use App\Repository\EnduranceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnduranceRepository::class)
 */
class Endurance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $maximum;

    /**
     * @ORM\Column(type="integer")
     */
    private $fatigue;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, mappedBy="endurance", cascade={"persist", "remove"})
     */
    private $personnage;

    /**
     * @ORM\OneToMany(targetEntity=Tresor::class, mappedBy="endurance")
     */
    private $tresor;

    /**
     * @ORM\OneToOne(targetEntity=Bouclier::class, mappedBy="endurance", cascade={"persist", "remove"})
     */
    private $bouclier;

    /**
     * @ORM\OneToOne(targetEntity=Armure::class, mappedBy="endurance", cascade={"persist", "remove"})
     */
    private $armure;

    /**
     * @ORM\OneToMany(targetEntity=Arme::class, mappedBy="endurance")
     */
    private $armes;

    public function __construct()
    {
        $this->tresor = new ArrayCollection();
        $this->armes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaximum(): ?int
    {
        return $this->maximum;
    }

    public function setMaximum(int $maximum): self
    {
        $this->maximum = $maximum;

        return $this;
    }

    public function getFatigue(): ?int
    {
        return $this->fatigue;
    }

    public function setFatigue(int $fatigue): self
    {
        $this->fatigue = $fatigue;

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
            $this->personnage->setEndurance(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getEndurance() !== $this) {
            $personnage->setEndurance($this);
        }

        $this->personnage = $personnage;

        return $this;
    }

    /**
     * @return Collection|Tresor[]
     */
    public function getTresor(): Collection
    {
        return $this->tresor;
    }

    public function addTresor(Tresor $tresor): self
    {
        if (!$this->tresor->contains($tresor)) {
            $this->tresor[] = $tresor;
            $tresor->setEndurance($this);
        }

        return $this;
    }

    public function removeTresor(Tresor $tresor): self
    {
        if ($this->tresor->removeElement($tresor)) {
            // set the owning side to null (unless already changed)
            if ($tresor->getEndurance() === $this) {
                $tresor->setEndurance(null);
            }
        }

        return $this;
    }

    public function getBouclier(): ?Bouclier
    {
        return $this->bouclier;
    }

    public function setBouclier(?Bouclier $bouclier): self
    {
        // unset the owning side of the relation if necessary
        if ($bouclier === null && $this->bouclier !== null) {
            $this->bouclier->setEndurance(null);
        }

        // set the owning side of the relation if necessary
        if ($bouclier !== null && $bouclier->getEndurance() !== $this) {
            $bouclier->setEndurance($this);
        }

        $this->bouclier = $bouclier;

        return $this;
    }

    public function getArmure(): ?Armure
    {
        return $this->armure;
    }

    public function setArmure(?Armure $armure): self
    {
        // unset the owning side of the relation if necessary
        if ($armure === null && $this->armure !== null) {
            $this->armure->setEndurance(null);
        }

        // set the owning side of the relation if necessary
        if ($armure !== null && $armure->getEndurance() !== $this) {
            $armure->setEndurance($this);
        }

        $this->armure = $armure;

        return $this;
    }

    /**
     * @return Collection|Arme[]
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Arme $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes[] = $arme;
            $arme->setEndurance($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getEndurance() === $this) {
                $arme->setEndurance(null);
            }
        }

        return $this;
    }
}
