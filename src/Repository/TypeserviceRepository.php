<?php

namespace App\Repository;

use App\Entity\Typeservice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typeservice|null find($serviceid, $lockMode = null, $lockVersion = null)
 * @method Typeservice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeservice[]    findAll()
 * @method Typeservice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeserviceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeservice::class);
    }

    // /**
    //  * @return Typeservice[] Returns an array of Typeservice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.serviceid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typeservice
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
