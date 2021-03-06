<?php

namespace App\Repository;

use App\Entity\Element;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Element|null find($id, $lockMode = null, $lockVersion = null)
 * @method Element|null findOneBy(array $criteria, array $orderBy = null)
 * @method Element[]    findAll()
 * @method Element[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Element::class);
    }

    // /**
    //  * @return Element[] Returns an array of Element objects
    //  */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.id = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    public function allorderbyprice($value)
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.prix', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Element
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
