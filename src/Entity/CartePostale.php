<?php

namespace App\Entity;

use App\Repository\CartePostaleRepository;
use App\Trait\TimeStampTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartePostaleRepository::class)]
#[ORM\HasLifecycleCallbacks]
class CartePostale
{   use TimeStampTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagefront = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageback = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $quantite_stock = null;

    #[ORM\ManyToOne(inversedBy: 'cartePostales')]
    private ?Region $region = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImagefront(): ?string
    {
        return $this->imagefront;
    }

    public function setImagefront(?string $imagefront): static
    {
        $this->imagefront = $imagefront;

        return $this;
    }

    public function getImageback(): ?string
    {
        return $this->imageback;
    }

    public function setImageback(?string $imageback): static
    {
        $this->imageback = $imageback;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantiteStock(): ?int
    {
        return $this->quantite_stock;
    }

    public function setQuantiteStock(?int $quantite_stock): static
    {
        $this->quantite_stock = $quantite_stock;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }
}
