<?php

namespace App\Repository;

use App\Entity\Typeunite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typeunite|null find($typeid, $lockMode = null, $lockVersion = null)
 * @method Typeunite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeunite[]    findAll()
 * @method Typeunite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeuniteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeunite::class);
    }

    // /**
    //  * @return Typeunite[] Returns an array of Typeunite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.typeid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typeunite
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
