<?php

namespace App\Repository;

use App\Entity\Normeinstrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Normeinstrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method Normeinstrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method Normeinstrument[]    findAll()
 * @method Normeinstrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NormeinstrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Normeinstrument::class);
    }

    // /**
    //  * @return Normeinstrument[] Returns an array of Normeinstrument objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Normeinstrument
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
