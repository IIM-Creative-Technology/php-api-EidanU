<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="float")
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $ann�e;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="promotions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $promotion;


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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?float
    {
        return $this->age;
    }

    public function setAge(float $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAnn�e(): ?int
    {
        return $this->ann�e;
    }

    public function setAnn�e(int $ann�e): self
    {
        $this->ann�e = $ann�e;

        return $this;
    }

    public function getPromotion(): ?Classe
    {
        return $this->promotion;
    }

    public function setPromotion(?Classe $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }


}
