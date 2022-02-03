<?php

namespace App\Repository;

use App\Entity\Endurance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Endurance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Endurance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Endurance[]    findAll()
 * @method Endurance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnduranceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Endurance::class);
    }

    // /**
    //  * @return Endurance[] Returns an array of Endurance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Endurance
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
