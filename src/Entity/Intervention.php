<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 */
class Intervention
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
    private $mesure;

    /**
     * @ORM\Column(type="float")
     */
    private $ecart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persone", inversedBy="interventions")
     */
    private $persones;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMesure(): ?float
    {
        return $this->mesure;
    }

    public function setMesure(float $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }

    public function getEcart(): ?float
    {
        return $this->ecart;
    }

    public function setEcart(float $ecart): self
    {
        $this->ecart = $ecart;

        return $this;
    }

    public function getPersones(): ?Persone
    {
        return $this->persones;
    }

    public function setPersones(?Persone $persones): self
    {
        $this->persones = $persones;

        return $this;
    }
}
