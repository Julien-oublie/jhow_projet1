<?php

namespace App\Repository;

use App\Entity\CompetenceDeGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompetenceDeGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetenceDeGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetenceDeGroupe[]    findAll()
 * @method CompetenceDeGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetenceDeGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetenceDeGroupe::class);
    }

    // /**
    //  * @return CompetenceDeGroupe[] Returns an array of CompetenceDeGroupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompetenceDeGroupe
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
