<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function AychaK($text)
    {
        return $this->createQueryBuilder('a')
            ->where('a.titre = :texte')
            ->setParameter('texte' ,$text)
            ->getQuery()
            ->getResult();

    }

    public function findarticlebytitle()
    {
        return $this->createQueryBuilder('a')
            ->where('a.titre like :texte ')
            ->setParameter('texte','Games%')
            ->getQuery()
            ->getResult();

    }
    public function findarticlebytitle1()
    {
        return $this->createQueryBuilder('a')
            ->where('a.titre like :texte ')
            ->setParameter('texte','Tournoi%')
            ->getQuery()
            ->getResult();

    }
    public function findarticlebytitle2()
    {
        return $this->createQueryBuilder('a')
            ->where('a.titre like :texte ')
            ->setParameter('texte','Product%')
            ->getQuery()
            ->getResult();

    }
    public function findarticlebytitle3()
    {
        return $this->createQueryBuilder('a')
            ->where('a.titre like :texte ')
            ->setParameter('texte','Deliverer%')
            ->getQuery()
            ->getResult();

    }

    function findbysearchbar($texte){
        return $this->createQueryBuilder('a')
            ->where('a.titre like %:texte%')
            ->setParameter('texte',$texte)
            ->getQuery()
            ->getResult();

    }
    public function search($mots = null){
        $query = $this->createQueryBuilder('a');

        if($mots != null){
            $query->Where('a.titre like :texte')
                ->setParameter('texte',$mots);
        }

        return $query->getQuery()->getResult();
    }

}
