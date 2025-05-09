<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use App\Trait\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Region
{   use TimeStampTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'region')]
    private ?Pays $pays = null;

    /**
     * @var Collection<int, CartePostale>
     */
    #[ORM\OneToMany(targetEntity: CartePostale::class, mappedBy: 'region')]
    private Collection $cartePostales;

    public function __construct()
    {
        $this->cartePostales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection<int, CartePostale>
     */
    public function getCartePostales(): Collection
    {
        return $this->cartePostales;
    }

    public function addCartePostale(CartePostale $cartePostale): static
    {
        if (!$this->cartePostales->contains($cartePostale)) {
            $this->cartePostales->add($cartePostale);
            $cartePostale->setRegion($this);
        }

        return $this;
    }

    public function removeCartePostale(CartePostale $cartePostale): static
    {
        if ($this->cartePostales->removeElement($cartePostale)) {
            // set the owning side to null (unless already changed)
            if ($cartePostale->getRegion() === $this) {
                $cartePostale->setRegion(null);
            }
        }

        return $this;
    }
}
