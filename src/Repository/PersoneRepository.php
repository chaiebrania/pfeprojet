<?php

namespace App\Repository;

use App\Entity\Persone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Persone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Persone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Persone[]    findAll()
 * @method Persone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Persone::class);
    }

    // /**
    //  * @return Persone[] Returns an array of Persone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Persone
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
