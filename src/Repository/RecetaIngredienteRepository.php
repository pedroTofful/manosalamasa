<?php

namespace App\Repository;

use App\Entity\RecetaIngrediente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecetaIngrediente|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetaIngrediente|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetaIngrediente[]    findAll()
 * @method RecetaIngrediente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetaIngredienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecetaIngrediente::class);
    }

    // /**
    //  * @return RecetaIngrediente[] Returns an array of RecetaIngrediente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecetaIngrediente
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
