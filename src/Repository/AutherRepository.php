<?php

namespace App\Repository;

use App\Entity\Auther;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Auther>
 */
class AutherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Auther::class);
    }

    //    /**
    //     * @return Auther[] Returns an array of Auther objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Auther
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function getAllByDQL(){
        $dql = $this->getEntityManager()->createQuery("Select auther from \App\Entity\Auther as  auther ORDER BY auther.id Desc ");
        return $dql->getResult();
    }
    public function getAllByDQLQB(){
    return $this->createQueryBuilder('auther')
        ->addSelect('book')
        ->leftJoin('auther.books','book')
        ->orderBy('auther.id', 'ASC')
        ->getQuery()
        ->getResult();
    }
}