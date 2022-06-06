<?php

namespace App\Repository;

use App\Entity\FicheTraitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheTraitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheTraitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheTraitement[]    findAll()
 * @method FicheTraitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheTraitementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheTraitement::class);
    }

    // /**
    //  * @return FicheTraitement[] Returns an array of FicheTraitement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheTraitement
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
