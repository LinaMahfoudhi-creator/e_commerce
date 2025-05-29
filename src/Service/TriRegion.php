<?php

namespace App\Service;


use App\Entity\Region;
use Doctrine\Persistence\ManagerRegistry;

class TriRegion
{
    private $regions;
    public function __construct(ManagerRegistry $doctrine){
        $repository = $doctrine->getRepository(Region::class);
        $this->regions = $repository->findAll();
    }
    public function getPays(): array{
        return $this->regions;
    }

}