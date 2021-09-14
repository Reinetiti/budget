<?php

namespace App\Repository;

use App\Entity\Misetat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Misetat|null find($misetatid, $lockMode = null, $lockVersion = null)
 * @method Misetat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Misetat[]    findAll()
 * @method Misetat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MisetatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Misetat::class);
    }

    // /**
    //  * @return Misetat[] Returns an array of Misetat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.misetatid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Misetat
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
