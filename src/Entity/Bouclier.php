<?php

namespace App\Entity;

use App\Repository\BouclierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BouclierRepository::class)
 */
class Bouclier
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
    private $esquive;

    /**
     * @ORM\OneToOne(targetEntity=Endurance::class, inversedBy="bouclier", cascade={"persist", "remove"})
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

    public function getEsquive(): ?string
    {
        return $this->esquive;
    }

    public function setEsquive(string $esquive): self
    {
        $this->esquive = $esquive;

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
