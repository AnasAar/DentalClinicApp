<?php

namespace App\Entity;

use App\Repository\DossierMedicalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierMedicalRepository::class)
 */
class DossierMedical
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
    private $cnss;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $cnops;

    /**
     * @ORM\Column(type="text")
     */
    private $obsservation;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="dossiermedical")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }

    public function getCnops(): ?string
    {
        return $this->cnops;
    }

    public function setCnops(string $cnops): self
    {
        $this->cnops = $cnops;

        return $this;
    }

    public function getObsservation(): ?string
    {
        return $this->obsservation;
    }

    public function setObsservation(string $obsservation): self
    {
        $this->obsservation = $obsservation;

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
}
