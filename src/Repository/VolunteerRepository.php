<?php

namespace App\Repository;

use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Experience|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experience|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experience[]    findAll()
 * @method Experience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolunteerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Volunteer::class);
    }

    public function getVolunteer($nbPerPage)
    {
        $query = $this->createQueryBuilder('r')
        //Jointure sur l'attribut image
            ->orderBy('r.createdAt', 'DESC')
            ->setMaxResults($nbPerPage)
            ->getQuery()
            ->getResult();
    }

//--------------------HOME------------------------------------------------------------------------------------
    public function findLastArticle()
    {
        return $this->findBy([], ['id' => 'DESC'], 1, 0);
    }

    public function findNextArticles()
    {
        return $this->findBy([], ['id' => 'DESC'], 2, 1);
    }

    public function findNextFollowArticles()
    {
        return $this->findBy([], ['id' => 'DESC'], 4, 3);
    }

   // -------------------------------------------------------------------------

    public function findLastArticles()
    {
        return $this->findBy([], ['id' => 'DESC'], 2, 0);
    }

    public function findfollowArticles()
    {
        return $this->findBy([], ['id' => 'DESC'], 10, 2);
    }
    // /**
    //  * @return Experience[] Returns an array of Experience objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Experience
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
