<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $tarif;

    /**
     * @ORM\Column(type="date")
     */
    private $date_facture;

    /**
     * @ORM\ManyToOne(targetEntity=Paiement::class, inversedBy="facture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paiment;

    /**
     * @ORM\ManyToOne(targetEntity=FicheTraitement::class, inversedBy="facture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fiche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getPaiment(): ?Paiement
    {
        return $this->paiment;
    }

    public function setPaiment(?Paiement $paiment): self
    {
        $this->paiment = $paiment;

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
