<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $mode_paiment;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_paye;

    /**
     * @ORM\Column(type="float")
     */
    private $montantnon_paye;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="paiment")
     */
    private $facture;

    public function __construct()
    {
        $this->facture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModePaiment(): ?string
    {
        return $this->mode_paiment;
    }

    public function setModePaiment(string $mode_paiment): self
    {
        $this->mode_paiment = $mode_paiment;

        return $this;
    }

    public function getMontantPaye(): ?float
    {
        return $this->montant_paye;
    }

    public function setMontantPaye(float $montant_paye): self
    {
        $this->montant_paye = $montant_paye;

        return $this;
    }

    public function getMontantnonPaye(): ?float
    {
        return $this->montantnon_paye;
    }

    public function setMontantnonPaye(float $montantnon_paye): self
    {
        $this->montantnon_paye = $montantnon_paye;

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
            $facture->setPaiment($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->facture->contains($facture)) {
            $this->facture->removeElement($facture);
            // set the owning side to null (unless already changed)
            if ($facture->getPaiment() === $this) {
                $facture->setPaiment(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }
}
