<?php

namespace App\Repository;
use App\Entity\Tournoi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tournoi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tournoi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tournoi[]    findAll()
 * @method Tournoi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournoiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tournoi::class);
    }


    //METIER
    public function  getTopParticipantsTournoi() {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder(); // dql
        $query->select('t.id ,t.nbparticipant')
            ->from('App\Entity\Tournoi','t')
            ->orderBy('t.nbparticipant','DESC')
            ->setMaxResults(5);
        $res = $query->getQuery();
        return $res->execute();
    }




}
