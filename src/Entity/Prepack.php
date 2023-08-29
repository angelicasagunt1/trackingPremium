<?php
// src/Entity/Prepack.php

namespace App\Entity;

use App\Repository\PrepackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrepackRepository")
 * @ORM\Table(name="prepack")
 */
#[ORM\Entity(repositoryClass: PrepackRepository::class)]
class Prepack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected $id;

    #[ORM\Column(type: 'datetime')]
    private $creationdate;

    #[ORM\Column(type: 'datetime')]
    private $arrivedate;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $tracking;

    #[ORM\Column(type: 'integer')]
    private $npack;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $packtype;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $aux;

    #[ORM\Column(type: 'float')]
    private $weight;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $image;

    // Getters and setters...

    public function getId(): ?int
    {
    return $this->id;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
    return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
    $this->creationdate = $creationdate;

    return $this;
    }

    public function getArrivedate(): ?\DateTimeInterface
    {
    return $this->arrivedate;
    }

    public function setArrivedate(\DateTimeInterface $arrivedate): self
    {
    $this->arrivedate = $arrivedate;

    return $this;
    }

    public function getTracking(): ?string
    {
    return $this->tracking;
    }

    public function setTracking(string $tracking): self
    {
    $this->tracking = $tracking;

    return $this;
    }

    public function getNpack(): ?int
    {
    return $this->npack;
    }

    public function setNpack(int $npack): self
    {
    $this->npack = $npack;

    return $this;
    }

    public function getPacktype(): ?string
    {
    return $this->packtype;
    }

    public function setPacktype(?string $packtype): self
    {
    $this->packtype = $packtype;

    return $this;
    }

    public function getAux(): ?string
    {
    return $this->aux;
    }

    public function setAux(?string $aux): self
    {
    $this->aux = $aux;

    return $this;
    }

    public function getWeight(): ?float
    {
    return $this->weight;
    }

    public function setWeight(float $weight): self
    {
    $this->weight = $weight;

    return $this;
    }

    public function getImage(): ?string
    {
    return $this->image;
    }

    public function setImage(?string $image): self
    {
    $this->image = $image;

    return $this;
    }
}
