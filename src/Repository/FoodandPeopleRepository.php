<?php

namespace App\Repository;

use App\Entity\FoodandPeople;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FoodandPeople|null find($id, $lockMode = null, $lockVersion = null)
 * @method FoodandPeople|null findOneBy(array $criteria, array $orderBy = null)
 * @method FoodandPeople[]    findAll()
 * @method FoodandPeople[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodandPeopleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodandPeople::class);
    }

    public function getFP($nbPerPage)
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
    //  * @return FoodandPeople[] Returns an array of FoodandPeople objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FoodandPeople
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
