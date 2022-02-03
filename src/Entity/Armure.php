<?php

namespace App\Entity;

use App\Repository\ArmureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmureRepository::class)
 */
class Armure
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
     * @ORM\Column(type="integer")
     */
    private $enc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $protection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=Endurance::class, inversedBy="armure", cascade={"persist", "remove"})
     */
    private $endurance;

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

    public function getEnc(): ?int
    {
        return $this->enc;
    }

    public function setEnc(int $enc): self
    {
        $this->enc = $enc;

        return $this;
    }

    public function getProtection(): ?string
    {
        return $this->protection;
    }

    public function setProtection(string $protection): self
    {
        $this->protection = $protection;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEndurance(): ?Endurance
    {
        return $this->endurance;
    }

    public function setEndurance(?Endurance $endurance): self
    {
        $this->endurance = $endurance;

        return $this;
    }
}
