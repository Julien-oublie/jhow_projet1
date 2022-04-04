<?php

namespace App\Entity;

use App\Repository\CompetenceDeGroupeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceDeGroupeRepository::class)
 */
class CompetenceDeGroupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $personalite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mouvement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $perception;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $survie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coutume;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vocation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $avencement;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, inversedBy="competenceDeGroupe", cascade={"persist", "remove"})
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonalite(): ?int
    {
        return $this->personalite;
    }

    public function setPersonalite(?int $personalite): self
    {
        $this->personalite = $personalite;

        return $this;
    }

    public function getMouvement(): ?int
    {
        return $this->mouvement;
    }

    public function setMouvement(?int $mouvement): self
    {
        $this->mouvement = $mouvement;

        return $this;
    }

    public function getPerception(): ?int
    {
        return $this->perception;
    }

    public function setPerception(?int $perception): self
    {
        $this->perception = $perception;

        return $this;
    }

    public function getSurvie(): ?int
    {
        return $this->survie;
    }

    public function setSurvie(?int $survie): self
    {
        $this->survie = $survie;

        return $this;
    }

    public function getCoutume(): ?int
    {
        return $this->coutume;
    }

    public function setCoutume(?int $coutume): self
    {
        $this->coutume = $coutume;

        return $this;
    }

    public function getVocation(): ?int
    {
        return $this->vocation;
    }

    public function setVocation(?int $vocation): self
    {
        $this->vocation = $vocation;

        return $this;
    }

    public function getAvencement(): ?int
    {
        return $this->avencement;
    }

    public function setAvencement(?int $avencement): self
    {
        $this->avencement = $avencement;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): self
    {
        $this->personnage = $personnage;

        return $this;
    }
}
