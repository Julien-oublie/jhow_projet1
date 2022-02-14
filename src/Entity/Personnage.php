<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * 
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
     * @Assert\NotBlank()
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avantage_culturel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $background;

    /**
     * @ORM\Column(type="array")
     */
    private $specialite = [];

    /**
     * @ORM\Column(type="array")
     */
    private $particularite = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Admiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Athletisme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Conscience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Exploration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Chant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Artisanat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Inspiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Voyage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Perspicacite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Guerison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Courtoisie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Combat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Persuasion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Furtivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Fouille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Chasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Enigmes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Conaissances;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence_favorite;

    /**
     * @ORM\Column(type="integer")
     */
    private $coeur;

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

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getAvantageCulturel(): ?string
    {
        return $this->avantage_culturel;
    }

    public function setAvantageCulturel(string $avantage_culturel): self
    {
        $this->avantage_culturel = $avantage_culturel;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getSpecialite(): ?array
    {
        return $this->specialite;
    }

    public function setSpecialite(array $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getParticularite(): ?array
    {
        return $this->particularite;
    }

    public function setParticularite(array $particularite): self
    {
        $this->particularite = $particularite;

        return $this;
    }

    public function getAdmiration(): ?string
    {
        return $this->Admiration;
    }

    public function setAdmiration(string $Admiration): self
    {
        $this->Admiration = $Admiration;

        return $this;
    }

    public function getAthletisme(): ?string
    {
        return $this->Athletisme;
    }

    public function setAthletisme(string $Athletisme): self
    {
        $this->Athletisme = $Athletisme;

        return $this;
    }

    public function getConscience(): ?string
    {
        return $this->Conscience;
    }

    public function setConscience(string $Conscience): self
    {
        $this->Conscience = $Conscience;

        return $this;
    }

    public function getExploration(): ?string
    {
        return $this->Exploration;
    }

    public function setExploration(string $Exploration): self
    {
        $this->Exploration = $Exploration;

        return $this;
    }

    public function getChant(): ?string
    {
        return $this->Chant;
    }

    public function setChant(string $Chant): self
    {
        $this->Chant = $Chant;

        return $this;
    }

    public function getArtisanat(): ?string
    {
        return $this->Artisanat;
    }

    public function setArtisanat(string $Artisanat): self
    {
        $this->Artisanat = $Artisanat;

        return $this;
    }

    public function getInspiration(): ?string
    {
        return $this->Inspiration;
    }

    public function setInspiration(string $Inspiration): self
    {
        $this->Inspiration = $Inspiration;

        return $this;
    }

    public function getVoyage(): ?string
    {
        return $this->Voyage;
    }

    public function setVoyage(string $Voyage): self
    {
        $this->Voyage = $Voyage;

        return $this;
    }

    public function getPerspicacite(): ?string
    {
        return $this->Perspicacite;
    }

    public function setPerspicacite(string $Perspicacite): self
    {
        $this->Perspicacite = $Perspicacite;

        return $this;
    }

    public function getGuerison(): ?string
    {
        return $this->Guerison;
    }

    public function setGuerison(string $Guerison): self
    {
        $this->Guerison = $Guerison;

        return $this;
    }

    public function getCourtoisie(): ?string
    {
        return $this->Courtoisie;
    }

    public function setCourtoisie(string $Courtoisie): self
    {
        $this->Courtoisie = $Courtoisie;

        return $this;
    }

    public function getCombat(): ?string
    {
        return $this->Combat;
    }

    public function setCombat(string $Combat): self
    {
        $this->Combat = $Combat;

        return $this;
    }

    public function getPersuasion(): ?string
    {
        return $this->Persuasion;
    }

    public function setPersuasion(string $Persuasion): self
    {
        $this->Persuasion = $Persuasion;

        return $this;
    }

    public function getFurtivite(): ?string
    {
        return $this->Furtivite;
    }

    public function setFurtivite(string $Furtivite): self
    {
        $this->Furtivite = $Furtivite;

        return $this;
    }

    public function getFouille(): ?string
    {
        return $this->Fouille;
    }

    public function setFouille(string $Fouille): self
    {
        $this->Fouille = $Fouille;

        return $this;
    }

    public function getChasse(): ?string
    {
        return $this->Chasse;
    }

    public function setChasse(string $Chasse): self
    {
        $this->Chasse = $Chasse;

        return $this;
    }

    public function getEnigmes(): ?string
    {
        return $this->Enigmes;
    }

    public function setEnigmes(string $Enigmes): self
    {
        $this->Enigmes = $Enigmes;

        return $this;
    }

    public function getConaissances(): ?string
    {
        return $this->Conaissances;
    }

    public function setConaissances(string $Conaissances): self
    {
        $this->Conaissances = $Conaissances;

        return $this;
    }

    public function getCompetenceFavorite(): ?string
    {
        return $this->competence_favorite;
    }

    public function setCompetenceFavorite(string $competence_favorite): self
    {
        $this->competence_favorite = $competence_favorite;

        return $this;
    }

    public function getCoeur(): ?int
    {
        return $this->coeur;
    }

    public function setCoeur(int $coeur): self
    {
        $this->coeur = $coeur;

        return $this;
    }
}
