<?php

namespace App\Repository;

use App\Entity\Interview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Interview::class);
    }

    public function getRecipe($nbPerPage)
    {
        $query = $this->createQueryBuilder('i')
        //Jointure sur l'attribut image
            ->orderBy('i.createdAt', 'DESC')
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

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
