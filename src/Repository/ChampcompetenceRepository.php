<?php

namespace App\Repository;

use App\Entity\Champcompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Champcompetence|null find($competenceid, $lockMode = null, $lockVersion = null)
 * @method Champcompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Champcompetence[]    findAll()
 * @method Champcompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampcompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Champcompetence::class);
    }

    // /**
    //  * @return Champcompetence[] Returns an array of Champcompetence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.competenceid', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Champcompetence
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
