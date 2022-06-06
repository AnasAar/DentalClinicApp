<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_pat;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom_pat;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $email_pat;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sexe_pat;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $adresse_pat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cin_pat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel_pat;

    /**
     * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="patient")
     */
    private $rdv;

    /**
     * @ORM\OneToMany(targetEntity=FicheTraitement::class, mappedBy="patient")
     */
    private $fichetraitement;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="patient")
     */
    private $consultation;

    /**
     * @ORM\OneToMany(targetEntity=DossierMedical::class, mappedBy="patient")
     */
    private $dossiermedical;

    public function __construct()
    {
        $this->rdv = new ArrayCollection();
        $this->fichetraitement = new ArrayCollection();
        $this->consultation = new ArrayCollection();
        $this->dossiermedical = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPat(): ?string
    {
        return $this->nom_pat;
    }

    public function setNomPat(string $nom_pat): self
    {
        $this->nom_pat = $nom_pat;

        return $this;
    }

    public function getPrenomPat(): ?string
    {
        return $this->prenom_pat;
    }

    public function setPrenomPat(string $prenom_pat): self
    {
        $this->prenom_pat = $prenom_pat;

        return $this;
    }

    public function getEmailPat(): ?string
    {
        return $this->email_pat;
    }

    public function setEmailPat(?string $email_pat): self
    {
        $this->email_pat = $email_pat;

        return $this;
    }

    public function getSexePat(): ?string
    {
        return $this->sexe_pat;
    }

    public function setSexePat(string $sexe_pat): self
    {
        $this->sexe_pat = $sexe_pat;

        return $this;
    }

    public function getAdressePat(): ?string
    {
        return $this->adresse_pat;
    }

    public function setAdressePat(string $adresse_pat): self
    {
        $this->adresse_pat = $adresse_pat;

        return $this;
    }

    public function getCinPat(): ?string
    {
        return $this->cin_pat;
    }

    public function setCinPat(string $cin_pat): self
    {
        $this->cin_pat = $cin_pat;

        return $this;
    }

    public function getTelPat(): ?int
    {
        return $this->tel_pat;
    }

    public function setTelPat(?int $tel_pat): self
    {
        $this->tel_pat = $tel_pat;

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
            $rdv->setPatient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdv->contains($rdv)) {
            $this->rdv->removeElement($rdv);
            // set the owning side to null (unless already changed)
            if ($rdv->getPatient() === $this) {
                $rdv->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FicheTraitement[]
     */
    public function getFichetraitement(): Collection
    {
        return $this->fichetraitement;
    }

    public function addFichetraitement(FicheTraitement $fichetraitement): self
    {
        if (!$this->fichetraitement->contains($fichetraitement)) {
            $this->fichetraitement[] = $fichetraitement;
            $fichetraitement->setPatient($this);
        }

        return $this;
    }

    public function removeFichetraitement(FicheTraitement $fichetraitement): self
    {
        if ($this->fichetraitement->contains($fichetraitement)) {
            $this->fichetraitement->removeElement($fichetraitement);
            // set the owning side to null (unless already changed)
            if ($fichetraitement->getPatient() === $this) {
                $fichetraitement->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultation(): Collection
    {
        return $this->consultation;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultation->contains($consultation)) {
            $this->consultation[] = $consultation;
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultation->contains($consultation)) {
            $this->consultation->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DossierMedical[]
     */
    public function getDossiermedical(): Collection
    {
        return $this->dossiermedical;
    }

    public function addDossiermedical(DossierMedical $dossiermedical): self
    {
        if (!$this->dossiermedical->contains($dossiermedical)) {
            $this->dossiermedical[] = $dossiermedical;
            $dossiermedical->setPatient($this);
        }

        return $this;
    }

    public function removeDossiermedical(DossierMedical $dossiermedical): self
    {
        if ($this->dossiermedical->contains($dossiermedical)) {
            $this->dossiermedical->removeElement($dossiermedical);
            // set the owning side to null (unless already changed)
            if ($dossiermedical->getPatient() === $this) {
                $dossiermedical->setPatient(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNomPat()." ".$this->getPrenomPat() ;
    }
}
