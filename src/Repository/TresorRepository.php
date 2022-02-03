<?php

namespace App\Repository;

use App\Entity\Tresor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tresor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tresor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tresor[]    findAll()
 * @method Tresor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TresorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tresor::class);
    }

    // /**
    //  * @return Tresor[] Returns an array of Tresor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tresor
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
