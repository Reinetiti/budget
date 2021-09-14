<?php

namespace App\Repository;

use App\Entity\DemandeEngagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeEngagement|null find($numDemande, $lockMode = null, $lockVersion = null)
 * @method DemandeEngagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeEngagement[]    findAll()
 * @method DemandeEngagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeEngagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeEngagement::class);
    }

    // /**
    //  * @return DemandeEngagement[] Returns an array of DemandeEngagement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.numDemande', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandeEngagement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
