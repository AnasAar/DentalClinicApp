<?php

namespace App\Entity;

use App\Repository\FicheTraitementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheTraitementRepository::class)
 */
class FicheTraitement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_fiche;

    /**
     * @ORM\OneToMany(targetEntity=Lignetraitement::class, mappedBy="fiche")
     */
    private $lignetraitement;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="fiche")
     */
    private $facture;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="fichetraitement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function __construct()
    {
        $this->lignetraitement = new ArrayCollection();
        $this->facture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrFiche(): ?int
    {
        return $this->nbr_fiche;
    }

    public function setNbrFiche(int $nbr_fiche): self
    {
        $this->nbr_fiche = $nbr_fiche;

        return $this;
    }

    /**
     * @return Collection|Lignetraitement[]
     */
    public function getLignetraitement(): Collection
    {
        return $this->lignetraitement;
    }

    public function addLignetraitement(Lignetraitement $lignetraitement): self
    {
        if (!$this->lignetraitement->contains($lignetraitement)) {
            $this->lignetraitement[] = $lignetraitement;
            $lignetraitement->setFiche($this);
        }

        return $this;
    }

    public function removeLignetraitement(Lignetraitement $lignetraitement): self
    {
        if ($this->lignetraitement->contains($lignetraitement)) {
            $this->lignetraitement->removeElement($lignetraitement);
            // set the owning side to null (unless already changed)
            if ($lignetraitement->getFiche() === $this) {
                $lignetraitement->setFiche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFacture(): Collection
    {
        return $this->facture;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->facture->contains($facture)) {
            $this->facture[] = $facture;
            $facture->setFiche($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->facture->contains($facture)) {
            $this->facture->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getFiche() === $this) {
                $facture->setFiche(null);
            }
        }

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getPatient();
    }


}
