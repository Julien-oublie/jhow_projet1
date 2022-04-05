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

    /****************************** PARTIE CLASSE ******************************/

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe; 
    
    /**
     * @ORM\Column(type="array")
     */
    private $specialite = [];
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $standard_de_vie;
     
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $armes;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avantage_culturel;

    /**
     *@ORM\Column(type="integer")
     */
    private $Admiration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Athletisme;

    /**
     *@ORM\Column(type="integer")
     */
    private $Conscience;

    /**
     *@ORM\Column(type="integer")
     */
    private $Exploration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Chant;

    /**
     *@ORM\Column(type="integer")
     */
    private $Artisanat;

    /**
     *@ORM\Column(type="integer")
     */
    private $Inspiration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Voyage;

    /**
     *@ORM\Column(type="integer")
     */
    private $Perspicacite;

    /**
     *@ORM\Column(type="integer")
     */
    private $Guerison;

    /**
    *@ORM\Column(type="integer")
     */
    private $Courtoisie;

    /**
     *@ORM\Column(type="integer")
     */
    private $Combat;

    /**
    *@ORM\Column(type="integer")
     */
    private $Persuasion;

    /**
    *@ORM\Column(type="integer")
     */
    private $Furtivite;

    /**
    *@ORM\Column(type="integer")
     */
    private $Fouille;

    /**
    *@ORM\Column(type="integer")
     */
    private $Chasse;

    /**
     *@ORM\Column(type="integer")
     */
    private $Enigmes;

    /**
    *@ORM\Column(type="integer")
     */
    private $Conaissances;

   /****************************** PARTIE CLASSE ******************************/

   /****************************** PARTIE ORIGINE ******************************/
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine;

     /**
     * @ORM\Column(type="array")
     */
    private $particularite = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $coeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $corps;

    /**
     * @ORM\Column(type="integer")
     */
    private $esprit;


    /****************************** PARTIE ORIGINE ******************************/


    /****************************** PARTIE VOCATION ******************************/

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence_favorite;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competences_favorites_vocation;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $part_ombre;

      /**
     * @ORM\Column(type="string", length=255)
     */
    private $traits;
    /****************************** PARTIE VOCATION ******************************/


    public function __construct()
    {
        $this->traits = new ArrayCollection();
        $this->vertus = new ArrayCollection();
        $this->recompenses = new ArrayCollection();
       
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


    public function getVocation():  ?string
    {
        return $this->vocation;
    }

    public function setVocation(?string $vocation): self
    {
        $this->vocation = $vocation;

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

    public function getCompetencesFavoritesVocation(): ?string
    {
        return $this->competences_favorites_vocation;
    }

    public function setCompetencesFavoritesVocation(?string $competences_favorites_vocation): self
    {
        $this->competences_favorites_vocation = $competences_favorites_vocation;

        return $this;
    }

    public function getTraits(): ?string
    {
        return $this->traits;
    }

    public function setTraits(?string $traits): self
    {
        $this->traits = $traits;

        return $this;
    }

    public function getPartOmbre(): ?string
    {
        return $this->part_ombre;
    }

    public function setPartOmbre(?string $part_ombre): self
    {
        $this->part_ombre = $part_ombre;

        return $this;
    }

    public function getArmes(): ?string
    {
        return $this->armes;
    }

    public function setArmes(string $armes): self
    {
        $this->armes = $armes;

        return $this;
    }
}
