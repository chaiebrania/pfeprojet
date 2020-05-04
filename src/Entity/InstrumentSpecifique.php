<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstrumentSpecifiqueRepository")
 */
class InstrumentSpecifique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Poste", inversedBy="instruments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $poste;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="instruments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\Column(type="string")
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\InstrumentGenerale", inversedBy="instrumentspecifiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $instrumentGenerale;

    /**
     * @ORM\Column(type="float")
     */
    private $etendumin;

    /**
     * @ORM\Column(type="float")
     */
    private $etendumax;

    /**
     * @ORM\Column(type="date")
     */
    private $datemisenservice;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequencecalibrage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Norme", mappedBy="instrumentSpecifique")
     */
    private $desnormes;

    public function __construct()
    {
        $this->desnormes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getInstrumentGenerale(): ?InstrumentGenerale
    {
        return $this->instrumentGenerale;
    }

    public function setInstrumentGenerale(?InstrumentGenerale $instrumentGenerale): self
    {
        $this->instrumentGenerale = $instrumentGenerale;

        return $this;
    }

    public function getEtendumin(): ?float
    {
        return $this->etendumin;
    }

    public function setEtendumin(float $etendumin): self
    {
        $this->etendumin = $etendumin;

        return $this;
    }

    public function getEtendumax(): ?float
    {
        return $this->etendumax;
    }

    public function setEtendumax(float $etendumax): self
    {
        $this->etendumax = $etendumax;

        return $this;
    }

    public function getDatemisenservice(): ?\DateTimeInterface
    {
        return $this->datemisenservice;
    }

    public function setDatemisenservice(\DateTimeInterface $datemisenservice): self
    {
        $this->datemisenservice = $datemisenservice;

        return $this;
    }

    public function getFrequencecalibrage(): ?int
    {
        return $this->frequencecalibrage;
    }

    public function setFrequencecalibrage(int $frequencecalibrage): self
    {
        $this->frequencecalibrage = $frequencecalibrage;

        return $this;
    }

    /**
     * @return Collection|Norme[]
     */
    public function getDesnormes(): Collection
    {
        return $this->desnormes;
    }

    public function addDesnorme(Norme $desnorme): self
    {
        if (!$this->desnormes->contains($desnorme)) {
            $this->desnormes[] = $desnorme;
            $desnorme->setInstrumentSpecifique($this);
        }

        return $this;
    }

    public function removeDesnorme(Norme $desnorme): self
    {
        if ($this->desnormes->contains($desnorme)) {
            $this->desnormes->removeElement($desnorme);
            // set the owning side to null (unless already changed)
            if ($desnorme->getInstrumentSpecifique() === $this) {
                $desnorme->setInstrumentSpecifique(null);
            }
        }

        return $this;
    }
    public function __toString() { return $this->numero; }
}
