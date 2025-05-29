<?php

namespace App\Service;

use App\Entity\CartePostale;
use App\Entity\Pays;
use Doctrine\Persistence\ManagerRegistry;

class TriPays
{
    private $Pays;
    public function __construct(ManagerRegistry $doctrine){
        $repository = $doctrine->getRepository(Pays::class);
        $this->Pays = $repository->findAll();
    }
    public function getPays(): array{
        return $this->Pays;
    }
}