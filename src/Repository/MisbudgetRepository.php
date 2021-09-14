<?php

namespace App\Repository;

use App\Entity\Misbudget;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Misbudget|null find($misbudgetid, $lockMode = null, $lockVersion = null)
 * @method Misbudget|null findOneBy(array $criteria, array $orderBy = null)
 * @method Misbudget[]    findAll()
 * @method Misbudget[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MisbudgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Misbudget::class);
    }

    // /**
    //  * @return Misbudget[] Returns an array of Misbudget objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.misbudgetid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Misbudget
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
