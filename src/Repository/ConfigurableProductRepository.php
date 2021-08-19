<?php

namespace App\Repository;

use App\Entity\ConfigurableProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConfigurableProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigurableProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigurableProduct[]    findAll()
 * @method ConfigurableProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigurableProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigurableProduct::class);
    }

    // /**
    //  * @return ConfigurableProduct[] Returns an array of ConfigurableProduct objects
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
    public function findOneBySomeField($value): ?ConfigurableProduct
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