<?php

namespace App\Repository;

use App\Entity\Norme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Norme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Norme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Norme[]    findAll()
 * @method Norme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NormeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Norme::class);
    }

    // /**
    //  * @return Norme[] Returns an array of Norme objects
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
    public function findOneBySomeField($value): ?Norme
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
