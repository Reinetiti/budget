<?php

namespace App\Repository;

use App\Entity\Uniteadmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Uniteadmin|null find($uniteid, $lockMode = null, $lockVersion = null)
 * @method Uniteadmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uniteadmin[]    findAll()
 * @method Uniteadmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UniteadminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uniteadmin::class);
    }

    // /**
    //  * @return Uniteadmin[] Returns an array of Uniteadmin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.uniteid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uniteadmin
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
