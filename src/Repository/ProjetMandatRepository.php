<?php

namespace App\Repository;

use App\Entity\ProjetMandat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjetMandat|null find($numProjet, $lockMode = null, $lockVersion = null)
 * @method ProjetMandat|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetMandat[]    findAll()
 * @method ProjetMandat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetMandatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjetMandat::class);
    }

    // /**
    //  * @return ProjetMandat[] Returns an array of ProjetMandat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.numProjet', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjetMandat
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
