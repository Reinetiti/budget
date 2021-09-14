<?php

namespace App\Repository;

use App\Entity\Budgetisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Budgetisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Budgetisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Budgetisation[]    findAll()
 * @method Budgetisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BudgetisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Budgetisation::class);
    }

    // /**
    //  * @return Budgetisation[] Returns an array of Budgetisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Budgetisation
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
