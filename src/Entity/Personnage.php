<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
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
    private $corps;

    /**
     * @ORM\Column(type="integer")
     */
    private $esprit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $standard_de_vie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experience;

    /**
     * @ORM\Column(type="integer")
     */
    private $courage;

    /**
     * @ORM\Column(type="integer")
     */
    private $sagesse;

    /**
     * @ORM\Column(type="integer")
     */
    private $dommage;

    /**
     * @ORM\Column(type="integer")
     */
    private $parade;

    /**
     * @ORM\Column(type="integer")
     */
    private $armure;

    /**
     * @ORM\Column(type="integer")
     */
    private $camaraderie;

    /**
     * @ORM\Column(type="integer")
     */
    private $prestige;

    /**
     * @ORM\OneToOne(targetEntity=Classe::class, inversedBy="personnage", cascade={"persist", "remove"})
     */
    private $classe;

    /**
     * @ORM\OneToOne(targetEntity=AvantageCulturelle::class, inversedBy="personnage", cascade={"persist", "remove"})
     */
    private $avantage_culturelle;

    /**
     * @ORM\ManyToMany(targetEntity=Traits::class, inversedBy="personnages")
     */
    private $traits;

    /**
     * @ORM\OneToOne(targetEntity=Vocation::class, inversedBy="personnage", cascade={"persist", "remove"})
     */
    private $vocation;

    /**
     * @ORM\ManyToOne(targetEntity=TableOfYears::class, inversedBy="personnages")
     */
    private $tableofyears;

    /**
     * @ORM\OneToOne(targetEntity=Espoir::class, inversedBy="personnage", cascade={"persist", "remove"})
     */
    private $espoir;

    /**
     * @ORM\OneToOne(targetEntity=Endurance::class, inversedBy="personnage", cascade={"persist", "remove"})
     */
    private $endurance;

    /**
     * @ORM\OneToOne(targetEntity=CompetenceDeGroupe::class, mappedBy="personnage", cascade={"persist", "remove"})
     */
    private $competenceDeGroupe;

    /**
     * @ORM\ManyToMany(targetEntity=Vertu::class, mappedBy="personnage")
     */
    private $vertus;

    /**
     * @ORM\OneToOne(targetEntity=Competence::class, mappedBy="personnage", cascade={"persist", "remove"})
     */
    private $competence;

    /**
     * @ORM\ManyToMany(targetEntity=Recompense::class, mappedBy="personnage")
     */
    private $recompenses;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="personnage")
     */
    private $groupes;

    public function __construct()
    {
        $this->traits = new ArrayCollection();
        $this->vertus = new ArrayCollection();
        $this->recompenses = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

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

    public function getCorps(): ?int
    {
        return $this->corps;
    }

    public function setCorps(int $corps): self
    {
        $this->corps = $corps;

        return $this;
    }

    public function getEsprit(): ?int
    {
        return $this->esprit;
    }

    public function setEsprit(int $esprit): self
    {
        $this->esprit = $esprit;

        return $this;
    }

    public function getStandardDeVie(): ?string
    {
        return $this->standard_de_vie;
    }

    public function setStandardDeVie(string $standard_de_vie): self
    {
        $this->standard_de_vie = $standard_de_vie;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getCourage(): ?int
    {
        return $this->courage;
    }

    public function setCourage(int $courage): self
    {
        $this->courage = $courage;

        return $this;
    }

    public function getSagesse(): ?int
    {
        return $this->sagesse;
    }

    public function setSagesse(int $sagesse): self
    {
        $this->sagesse = $sagesse;

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

    public function getParade(): ?int
    {
        return $this->parade;
    }

    public function setParade(int $parade): self
    {
        $this->parade = $parade;

        return $this;
    }

    public function getArmure(): ?int
    {
        return $this->armure;
    }

    public function setArmure(int $armure): self
    {
        $this->armure = $armure;

        return $this;
    }

    public function getCamaraderie(): ?int
    {
        return $this->camaraderie;
    }

    public function setCamaraderie(int $camaraderie): self
    {
        $this->camaraderie = $camaraderie;

        return $this;
    }

    public function getPrestige(): ?int
    {
        return $this->prestige;
    }

    public function setPrestige(int $prestige): self
    {
        $this->prestige = $prestige;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getAvantageCulturelle(): ?AvantageCulturelle
    {
        return $this->avantage_culturelle;
    }

    public function setAvantageCulturelle(?AvantageCulturelle $avantage_culturelle): self
    {
        $this->avantage_culturelle = $avantage_culturelle;

        return $this;
    }

    /**
     * @return Collection|Traits[]
     */
    public function getTraits(): Collection
    {
        return $this->traits;
    }

    public function addTrait(Traits $trait): self
    {
        if (!$this->traits->contains($trait)) {
            $this->traits[] = $trait;
        }

        return $this;
    }

    public function removeTrait(Traits $trait): self
    {
        $this->traits->removeElement($trait);

        return $this;
    }

    public function getVocation(): ?Vocation
    {
        return $this->vocation;
    }

    public function setVocation(?Vocation $vocation): self
    {
        $this->vocation = $vocation;

        return $this;
    }

    public function getTableofyears(): ?TableOfYears
    {
        return $this->tableofyears;
    }

    public function setTableofyears(?TableOfYears $tableofyears): self
    {
        $this->tableofyears = $tableofyears;

        return $this;
    }

    public function getEspoir(): ?Espoir
    {
        return $this->espoir;
    }

    public function setEspoir(?Espoir $espoir): self
    {
        $this->espoir = $espoir;

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

    public function getCompetenceDeGroupe(): ?CompetenceDeGroupe
    {
        return $this->competenceDeGroupe;
    }

    public function setCompetenceDeGroupe(?CompetenceDeGroupe $competenceDeGroupe): self
    {
        // unset the owning side of the relation if necessary
        if ($competenceDeGroupe === null && $this->competenceDeGroupe !== null) {
            $this->competenceDeGroupe->setPersonnage(null);
        }

        // set the owning side of the relation if necessary
        if ($competenceDeGroupe !== null && $competenceDeGroupe->getPersonnage() !== $this) {
            $competenceDeGroupe->setPersonnage($this);
        }

        $this->competenceDeGroupe = $competenceDeGroupe;

        return $this;
    }

    /**
     * @return Collection|Vertu[]
     */
    public function getVertus(): Collection
    {
        return $this->vertus;
    }

    public function addVertu(Vertu $vertu): self
    {
        if (!$this->vertus->contains($vertu)) {
            $this->vertus[] = $vertu;
            $vertu->addPersonnage($this);
        }

        return $this;
    }

    public function removeVertu(Vertu $vertu): self
    {
        if ($this->vertus->removeElement($vertu)) {
            $vertu->removePersonnage($this);
        }

        return $this;
    }

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function setCompetence(?Competence $competence): self
    {
        // unset the owning side of the relation if necessary
        if ($competence === null && $this->competence !== null) {
            $this->competence->setPersonnage(null);
        }

        // set the owning side of the relation if necessary
        if ($competence !== null && $competence->getPersonnage() !== $this) {
            $competence->setPersonnage($this);
        }

        $this->competence = $competence;

        return $this;
    }

    /**
     * @return Collection|Recompense[]
     */
    public function getRecompenses(): Collection
    {
        return $this->recompenses;
    }

    public function addRecompense(Recompense $recompense): self
    {
        if (!$this->recompenses->contains($recompense)) {
            $this->recompenses[] = $recompense;
            $recompense->addPersonnage($this);
        }

        return $this;
    }

    public function removeRecompense(Recompense $recompense): self
    {
        if ($this->recompenses->removeElement($recompense)) {
            $recompense->removePersonnage($this);
        }

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->addPersonnage($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removePersonnage($this);
        }

        return $this;
    }
}
