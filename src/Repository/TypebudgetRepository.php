<?php

namespace App\Repository;

use App\Entity\Typebudget;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typebudget|null find($typebudgetid, $lockMode = null, $lockVersion = null)
 * @method Typebudget|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typebudget[]    findAll()
 * @method Typebudget[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypebudgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typebudget::class);
    }

    // /**
    //  * @return Typebudget[] Returns an array of Typebudget objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.typebudgetid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typebudget
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
