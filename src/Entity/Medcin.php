<?php

namespace App\Entity;

use App\Repository\MedcinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedcinRepository::class)
 */
class Medcin
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
    private $nom_medcin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom_medcin;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel_medcin;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $email_medcin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cin_medcin;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_visite;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="medcin")
     */
    private $rdv;

    /**
     * @ORM\ManyToOne(targetEntity=Specialite::class, inversedBy="medcin")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;

    public function __construct()
    {
        $this->rdv = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedcin(): ?string
    {
        return $this->nom_medcin;
    }

    public function setNomMedcin(string $nom_medcin): self
    {
        $this->nom_medcin = $nom_medcin;

        return $this;
    }

    public function getPrenomMedcin(): ?string
    {
        return $this->prenom_medcin;
    }

    public function setPrenomMedcin(string $prenom_medcin): self
    {
        $this->prenom_medcin = $prenom_medcin;

        return $this;
    }

    public function getTelMedcin(): ?int
    {
        return $this->tel_medcin;
    }

    public function setTelMedcin(int $tel_medcin): self
    {
        $this->tel_medcin = $tel_medcin;

        return $this;
    }

    public function getEmailMedcin(): ?string
    {
        return $this->email_medcin;
    }

    public function setEmailMedcin(string $email_medcin): self
    {
        $this->email_medcin = $email_medcin;

        return $this;
    }

    public function getCinMedcin(): ?string
    {
        return $this->cin_medcin;
    }

    public function setCinMedcin(string $cin_medcin): self
    {
        $this->cin_medcin = $cin_medcin;

        return $this;
    }

    public function getPrixVisite(): ?float
    {
        return $this->prix_visite;
    }

    public function setPrixVisite(float $prix_visite): self
    {
        $this->prix_visite = $prix_visite;

        return $this;
    }

    public function getActive(): ?string
    {
        return $this->active;
    }

    public function setActive(string $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|Rdv[]
     */
    public function getRdv(): Collection
    {
        return $this->rdv;
    }

    public function addRdv(Rdv $rdv): self
    {
        if (!$this->rdv->contains($rdv)) {
            $this->rdv[] = $rdv;
            $rdv->setMedcin($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdv->contains($rdv)) {
            $this->rdv->removeElement($rdv);
            // set the owning side to null (unless already changed)
            if ($rdv->getMedcin() === $this) {
                $rdv->setMedcin(null);
            }
        }

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNomMedcin()." ".$this->getPrenomMedcin() ;
    }
}
