<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use App\Trait\TimeStampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Pays
{   use TimeStampTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    /**
     * @var Collection<int, Region>
     */
    #[ORM\OneToMany(targetEntity: Region::class, mappedBy: 'pays')]
    private Collection $region;

    public function __construct()
    {
        $this->region = new ArrayCollection();
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

    /**
     * @return Collection<int, Region>
     */
    public function getRegion(): Collection
    {
        return $this->region;
    }

    public function addRegion(Region $region): static
    {
        if (!$this->region->contains($region)) {
            $this->region->add($region);
            $region->setPays($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): static
    {
        if ($this->region->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getPays() === $this) {
                $region->setPays(null);
            }
        }

        return $this;
    }

}
