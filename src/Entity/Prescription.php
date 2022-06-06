<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrescriptionRepository::class)
 */
class Prescription
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
    private $nbr_fois;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $quand_medi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $forme_medi;

    /**
     * @ORM\OneToMany(targetEntity=Ordonance::class, mappedBy="prescription")
     */
    private $ordonance;

    /**
     * @ORM\ManyToOne(targetEntity=Medicament::class, inversedBy="prescription")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medcicament;

    public function __construct()
    {
        $this->ordonance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrFois(): ?int
    {
        return $this->nbr_fois;
    }

    public function setNbrFois(int $nbr_fois): self
    {
        $this->nbr_fois = $nbr_fois;

        return $this;
    }

    public function getQuandMedi(): ?string
    {
        return $this->quand_medi;
    }

    public function setQuandMedi(string $quand_medi): self
    {
        $this->quand_medi = $quand_medi;

        return $this;
    }

    public function getFormeMedi(): ?string
    {
        return $this->forme_medi;
    }

    public function setFormeMedi(string $forme_medi): self
    {
        $this->forme_medi = $forme_medi;

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
            $ordonance->setPrescription($this);
        }

        return $this;
    }

    public function removeOrdonance(Ordonance $ordonance): self
    {
        if ($this->ordonance->contains($ordonance)) {
            $this->ordonance->removeElement($ordonance);
            // set the owning side to null (unless already changed)
            if ($ordonance->getPrescription() === $this) {
                $ordonance->setPrescription(null);
            }
        }

        return $this;
    }

    public function getMedcicament(): ?Medicament
    {
        return $this->medcicament;
    }

    public function setMedcicament(?Medicament $medcicament): self
    {
        $this->medcicament = $medcicament;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId() ;
    }
}
