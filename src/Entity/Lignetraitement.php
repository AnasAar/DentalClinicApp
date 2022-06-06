<?php

namespace App\Entity;

use App\Repository\LignetraitementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LignetraitementRepository::class)
 */
class Lignetraitement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_dent;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type_traitement;

    /**
     * @ORM\ManyToOne(targetEntity=FicheTraitement::class, inversedBy="lignetraitement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fiche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDent(): ?string
    {
        return $this->nom_dent;
    }

    public function setNomDent(string $nom_dent): self
    {
        $this->nom_dent = $nom_dent;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getTypeTraitement(): ?string
    {
        return $this->type_traitement;
    }

    public function setTypeTraitement(string $type_traitement): self
    {
        $this->type_traitement = $type_traitement;

        return $this;
    }

    public function getFiche(): ?FicheTraitement
    {
        return $this->fiche;
    }

    public function setFiche(?FicheTraitement $fiche): self
    {
        $this->fiche = $fiche;

        return $this;
    }
}
