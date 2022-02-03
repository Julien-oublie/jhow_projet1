<?php

namespace App\Entity;

use App\Repository\RecompenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecompenseRepository::class)
 */
class Recompense
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
    private $objet;

    /**
     * @ORM\ManyToMany(targetEntity=Personnage::class, inversedBy="recompenses")
     */
    private $personnage;

    public function __construct()
    {
        $this->personnage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getPersonnage(): Collection
    {
        return $this->personnage;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnage->contains($personnage)) {
            $this->personnage[] = $personnage;
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        $this->personnage->removeElement($personnage);

        return $this;
    }
}
