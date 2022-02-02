<?php

namespace App\Entity;

use App\Repository\VocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VocationRepository::class)
 */
class Vocation
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
    private $indication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $part_dombre;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, mappedBy="vocation", cascade={"persist", "remove"})
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndication(): ?string
    {
        return $this->indication;
    }

    public function setIndication(string $indication): self
    {
        $this->indication = $indication;

        return $this;
    }

    public function getPartDombre(): ?string
    {
        return $this->part_dombre;
    }

    public function setPartDombre(string $part_dombre): self
    {
        $this->part_dombre = $part_dombre;

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
            $this->personnage->setVocation(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getVocation() !== $this) {
            $personnage->setVocation($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
