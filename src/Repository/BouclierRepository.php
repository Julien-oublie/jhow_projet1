<?php

namespace App\Repository;

use App\Entity\Bouclier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bouclier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bouclier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bouclier[]    findAll()
 * @method Bouclier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouclierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bouclier::class);
    }

    // /**
    //  * @return Bouclier[] Returns an array of Bouclier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bouclier
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
