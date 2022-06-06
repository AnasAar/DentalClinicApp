<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_cons;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type_cons;

    /**
     * @ORM\OneToMany(targetEntity=Ordonance::class, mappedBy="consultation")
     */
    private $ordonance;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consultation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function __construct()
    {
        $this->ordonance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCons(): ?\DateTimeInterface
    {
        return $this->date_cons;
    }

    public function setDateCons(\DateTimeInterface $date_cons): self
    {
        $this->date_cons = $date_cons;

        return $this;
    }

    public function getTypeCons(): ?string
    {
        return $this->type_cons;
    }

    public function setTypeCons(string $type_cons): self
    {
        $this->type_cons = $type_cons;

        return $this;
    }

    /**
     * @return Collection|Ordonance[]
     */
    public function getOrdonance(): Collection
    {
        return $this->ordonance;
    }

    public function addOrdonance(Ordonance $ordonance): self
    {
        if (!$this->ordonance->contains($ordonance)) {
            $this->ordonance[] = $ordonance;
            $ordonance->setConsultation($this);
        }

        return $this;
    }

    public function removeOrdonance(Ordonance $ordonance): self
    {
        if ($this->ordonance->contains($ordonance)) {
            $this->ordonance->removeElement($ordonance);
            // set the owning side to null (unless already changed)
            if ($ordonance->getConsultation() === $this) {
                $ordonance->setConsultation(null);
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
        return $this->getPatient() ;
    }
}
