<?php

namespace App\Repository;

use App\Entity\Catservice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Catservice|null find($catid, $lockMode = null, $lockVersion = null)
 * @method Catservice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Catservice[]    findAll()
 * @method Catservice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatserviceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Catservice::class);
    }

    // /**
    //  * @return Catservice[] Returns an array of Catservice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.catid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Catservice
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
