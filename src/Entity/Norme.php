<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NormeRepository")
 */
class Norme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Normeinstrument", mappedBy="norme")
     */
    private $normees;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\InstrumentSpecifique", inversedBy="desnormes")
     */
    private $instrumentSpecifique;

    public function __construct()
    {
        $this->normees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Normeinstrument[]
     */
    public function getNormees(): Collection
    {
        return $this->normees;
    }

    public function addNormee(Normeinstrument $normee): self
    {
        if (!$this->normees->contains($normee)) {
            $this->normees[] = $normee;
            $normee->setNorme($this);
        }

        return $this;
    }

    public function removeNormee(Normeinstrument $normee): self
    {
        if ($this->normees->contains($normee)) {
            $this->normees->removeElement($normee);
            // set the owning side to null (unless already changed)
            if ($normee->getNorme() === $this) {
                $normee->setNorme(null);
            }
        }

        return $this;
    }

    public function getInstrumentSpecifique(): ?InstrumentSpecifique
    {
        return $this->instrumentSpecifique;
    }

    public function setInstrumentSpecifique(?InstrumentSpecifique $instrumentSpecifique): self
    {
        $this->instrumentSpecifique = $instrumentSpecifique;

        return $this;
    }
     
}
