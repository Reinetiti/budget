<?php

namespace App\Repository;

use App\Entity\PieceJustificative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PieceJustificative|null find($idPiece, $lockMode = null, $lockVersion = null)
 * @method PieceJustificative|null findOneBy(array $criteria, array $orderBy = null)
 * @method PieceJustificative[]    findAll()
 * @method PieceJustificative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceJustificativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PieceJustificative::class);
    }

    // /**
    //  * @return PieceJustificative[] Returns an array of PieceJustificative objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.idPiece', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PieceJustificative
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
