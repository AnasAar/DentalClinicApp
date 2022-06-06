<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nom_specialite;

    /**
     * @ORM\OneToMany(targetEntity=Medcin::class, mappedBy="specialite")
     */
    private $medcin;

    public function __construct()
    {
        $this->medcin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpecialite(): ?string
    {
        return $this->nom_specialite;
    }

    public function setNomSpecialite(string $nom_specialite): self
    {
        $this->nom_specialite = $nom_specialite;

        return $this;
    }

    /**
     * @return Collection|Medcin[]
     */
    public function getMedcin(): Collection
    {
        return $this->medcin;
    }

    public function addMedcin(Medcin $medcin): self
    {
        if (!$this->medcin->contains($medcin)) {
            $this->medcin[] = $medcin;
            $medcin->setSpecialite($this);
        }

        return $this;
    }

    public function removeMedcin(Medcin $medcin): self
    {
        if ($this->medcin->contains($medcin)) {
            $this->medcin->removeElement($medcin);
            // set the owning side to null (unless already changed)
            if ($medcin->getSpecialite() === $this) {
                $medcin->setSpecialite(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNomSpecialite() ;
    }
}
