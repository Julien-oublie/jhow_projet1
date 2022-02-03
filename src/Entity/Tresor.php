<?php

namespace App\Entity;

use App\Repository\TresorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TresorRepository::class)
 */
class Tresor
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
    private $enc;

    /**
     * @ORM\Column(type="integer")
     */
    private $piece;

    /**
     * @ORM\ManyToOne(targetEntity=Endurance::class, inversedBy="tresor")
     */
    private $endurance;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPiece(): ?int
    {
        return $this->piece;
    }

    public function setPiece(int $piece): self
    {
        $this->piece = $piece;

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
