<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeRepository::class)
 */
class Arme
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
    private $dommage;

    /**
     * @ORM\Column(type="integer")
     */
    private $blessure;

    /**
     * @ORM\Column(type="integer")
     */
    private $enc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=Endurance::class, inversedBy="armes")
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

    public function getDommage(): ?int
    {
        return $this->dommage;
    }

    public function setDommage(int $dommage): self
    {
        $this->dommage = $dommage;

        return $this;
    }

    public function getBlessure(): ?int
    {
        return $this->blessure;
    }

    public function setBlessure(int $blessure): self
    {
        $this->blessure = $blessure;

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

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

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
