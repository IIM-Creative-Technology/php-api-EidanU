<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiants;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

   
    public function __construct()
    {
        $this->Etudiant = new ArrayCollection();
        $this->matiere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtudiants(): ?Etudiant
    {
        return $this->etudiants;
    }

    public function setEtudiants(Etudiant $etudiants): self
    {
        $this->etudiants = $etudiants;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }


}
