<?php

namespace App\Repository;

use App\Entity\Lignetraitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lignetraitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lignetraitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lignetraitement[]    findAll()
 * @method Lignetraitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignetraitementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lignetraitement::class);
    }

    // /**
    //  * @return Lignetraitement[] Returns an array of Lignetraitement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lignetraitement
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
