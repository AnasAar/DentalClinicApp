<?php

namespace App\Entity;

use App\Repository\OrdonanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdonanceRepository::class)
 */
class Ordonance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_ord;

    /**
     * @ORM\ManyToOne(targetEntity=Prescription::class, inversedBy="ordonance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prescription;

    /**
     * @ORM\ManyToOne(targetEntity=Consultation::class, inversedBy="ordonance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOrd(): ?\DateTimeInterface
    {
        return $this->date_ord;
    }

    public function setDateOrd(\DateTimeInterface $date_ord): self
    {
        $this->date_ord = $date_ord;

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->prescription;
    }

    public function setPrescription(?Prescription $prescription): self
    {
        $this->prescription = $prescription;

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }
}
