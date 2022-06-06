<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nom_medi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dose_medi;

    /**
     * @ORM\OneToMany(targetEntity=Prescription::class, mappedBy="medcicament")
     */
    private $prescription;

    public function __construct()
    {
        $this->prescription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedi(): ?string
    {
        return $this->nom_medi;
    }

    public function setNomMedi(string $nom_medi): self
    {
        $this->nom_medi = $nom_medi;

        return $this;
    }

    public function getDoseMedi(): ?string
    {
        return $this->dose_medi;
    }

    public function setDoseMedi(string $dose_medi): self
    {
        $this->dose_medi = $dose_medi;

        return $this;
    }

    /**
     * @return Collection|Prescription[]
     */
    public function getPrescription(): Collection
    {
        return $this->prescription;
    }

    public function addPrescription(Prescription $prescription): self
    {
        if (!$this->prescription->contains($prescription)) {
            $this->prescription[] = $prescription;
            $prescription->setMedcicament($this);
        }

        return $this;
    }

    public function removePrescription(Prescription $prescription): self
    {
        if ($this->prescription->contains($prescription)) {
            $this->prescription->removeElement($prescription);
            // set the owning side to null (unless already changed)
            if ($prescription->getMedcicament() === $this) {
                $prescription->setMedcicament(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNomMedi() ;
    }
}
