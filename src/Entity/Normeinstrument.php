<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NormeinstrumentRepository")
 */
class Normeinstrument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Norme", inversedBy="normees")
     */
    private $norme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getNorme(): ?Norme
    {
        return $this->norme;
    }

    public function setNorme(?Norme $norme): self
    {
        $this->norme = $norme;

        return $this;
    }
}
