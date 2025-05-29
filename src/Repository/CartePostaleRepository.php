<?php

namespace App\Repository;

use App\Entity\CartePostale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CartePostale>
 */
class CartePostaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartePostale::class);
    }
    public function orderbypriceAsc()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function orderbypriceDesc()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.prix', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function findByname($name)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return CartePostale[] Returns an array of CartePostale objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CartePostale
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
