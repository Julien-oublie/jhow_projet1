<?php

namespace App\Entity;

use App\Repository\EspoirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspoirRepository::class)
 */
class Espoir
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
    private $ombre;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, mappedBy="espoir", cascade={"persist", "remove"})
     */
    private $personnage;

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

    public function getOmbre(): ?int
    {
        return $this->ombre;
    }

    public function setOmbre(int $ombre): self
    {
        $this->ombre = $ombre;

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
            $this->personnage->setEspoir(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getEspoir() !== $this) {
            $personnage->setEspoir($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
