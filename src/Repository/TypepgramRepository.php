<?php

namespace App\Repository;

use App\Entity\Typepgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typepgram|null find($typepgramid, $lockMode = null, $lockVersion = null)
 * @method Typepgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typepgram[]    findAll()
 * @method Typepgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypepgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typepgram::class);
    }

    // /**
    //  * @return Typepgram[] Returns an array of Typepgram objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.typepgramid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typepgram
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
