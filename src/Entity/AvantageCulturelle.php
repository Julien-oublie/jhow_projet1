<?php

namespace App\Entity;

use App\Repository\AvantageCulturelleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvantageCulturelleRepository::class)
 */
class AvantageCulturelle
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
    private $benediction;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, mappedBy="avantage_culturelle", cascade={"persist", "remove"})
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBenediction(): ?string
    {
        return $this->benediction;
    }

    public function setBenediction(string $benediction): self
    {
        $this->benediction = $benediction;

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
            $this->personnage->setAvantageCulturelle(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getAvantageCulturelle() !== $this) {
            $personnage->setAvantageCulturelle($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
