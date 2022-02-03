<?php

namespace App\Repository;

use App\Entity\Espoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Espoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Espoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Espoir[]    findAll()
 * @method Espoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspoirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Espoir::class);
    }

    // /**
    //  * @return Espoir[] Returns an array of Espoir objects
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
    public function findOneBySomeField($value): ?Espoir
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
