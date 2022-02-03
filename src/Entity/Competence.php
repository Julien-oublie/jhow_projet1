<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
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
    private $admiration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $atletique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $confiance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $exploration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $artisanat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inspiration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $voyage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $perspicacite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $guerison;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $courtoisie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $combat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $persuasion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $furtivite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rechercher;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chasse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $enigme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tradition;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, inversedBy="competence", cascade={"persist", "remove"})
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdmiration(): ?int
    {
        return $this->admiration;
    }

    public function setAdmiration(?int $admiration): self
    {
        $this->admiration = $admiration;

        return $this;
    }

    public function getAtletique(): ?int
    {
        return $this->atletique;
    }

    public function setAtletique(?int $atletique): self
    {
        $this->atletique = $atletique;

        return $this;
    }

    public function getConfiance(): ?int
    {
        return $this->confiance;
    }

    public function setConfiance(?int $confiance): self
    {
        $this->confiance = $confiance;

        return $this;
    }

    public function getExploration(): ?int
    {
        return $this->exploration;
    }

    public function setExploration(?int $exploration): self
    {
        $this->exploration = $exploration;

        return $this;
    }

    public function getChant(): ?int
    {
        return $this->chant;
    }

    public function setChant(?int $chant): self
    {
        $this->chant = $chant;

        return $this;
    }

    public function getArtisanat(): ?int
    {
        return $this->artisanat;
    }

    public function setArtisanat(?int $artisanat): self
    {
        $this->artisanat = $artisanat;

        return $this;
    }

    public function getInspiration(): ?int
    {
        return $this->inspiration;
    }

    public function setInspiration(?int $inspiration): self
    {
        $this->inspiration = $inspiration;

        return $this;
    }

    public function getVoyage(): ?int
    {
        return $this->voyage;
    }

    public function setVoyage(?int $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }

    public function getPerspicacite(): ?int
    {
        return $this->perspicacite;
    }

    public function setPerspicacite(?int $perspicacite): self
    {
        $this->perspicacite = $perspicacite;

        return $this;
    }

    public function getGuerison(): ?int
    {
        return $this->guerison;
    }

    public function setGuerison(?int $guerison): self
    {
        $this->guerison = $guerison;

        return $this;
    }

    public function getCourtoisie(): ?int
    {
        return $this->courtoisie;
    }

    public function setCourtoisie(?int $courtoisie): self
    {
        $this->courtoisie = $courtoisie;

        return $this;
    }

    public function getCombat(): ?int
    {
        return $this->combat;
    }

    public function setCombat(?int $combat): self
    {
        $this->combat = $combat;

        return $this;
    }

    public function getPersuasion(): ?int
    {
        return $this->persuasion;
    }

    public function setPersuasion(?int $persuasion): self
    {
        $this->persuasion = $persuasion;

        return $this;
    }

    public function getFurtivite(): ?int
    {
        return $this->furtivite;
    }

    public function setFurtivite(?int $furtivite): self
    {
        $this->furtivite = $furtivite;

        return $this;
    }

    public function getRechercher(): ?int
    {
        return $this->rechercher;
    }

    public function setRechercher(?int $rechercher): self
    {
        $this->rechercher = $rechercher;

        return $this;
    }

    public function getChasse(): ?int
    {
        return $this->chasse;
    }

    public function setChasse(?int $chasse): self
    {
        $this->chasse = $chasse;

        return $this;
    }

    public function getEnigme(): ?int
    {
        return $this->enigme;
    }

    public function setEnigme(?int $enigme): self
    {
        $this->enigme = $enigme;

        return $this;
    }

    public function getTradition(): ?int
    {
        return $this->tradition;
    }

    public function setTradition(?int $tradition): self
    {
        $this->tradition = $tradition;

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
