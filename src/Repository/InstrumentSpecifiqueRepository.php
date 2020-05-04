<?php

namespace App\Repository;

use App\Entity\InstrumentSpecifique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InstrumentSpecifique|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstrumentSpecifique|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstrumentSpecifique[]    findAll()
 * @method InstrumentSpecifique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentSpecifiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstrumentSpecifique::class);
    }

    // /**
    //  * @return InstrumentSpecifique[] Returns an array of InstrumentSpecifique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InstrumentSpecifique
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
