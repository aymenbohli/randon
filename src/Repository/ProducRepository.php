<?php

namespace App\Repository;

use App\Entity\Produc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produc[]    findAll()
 * @method Produc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProducRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produc::class);
    }

    // /**
    //  * @return Produc[] Returns an array of Produc objects
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
    public function findOneBySomeField($value): ?Produc
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
