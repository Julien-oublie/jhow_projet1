<?php

namespace App\Repository;

use App\Entity\AvantageCulturelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AvantageCulturelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvantageCulturelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvantageCulturelle[]    findAll()
 * @method AvantageCulturelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvantageCulturelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvantageCulturelle::class);
    }

    // /**
    //  * @return AvantageCulturelle[] Returns an array of AvantageCulturelle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AvantageCulturelle
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
