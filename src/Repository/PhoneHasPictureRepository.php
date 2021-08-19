<?php

namespace App\Repository;

use App\Entity\PhoneHasPicture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhoneHasPicture|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhoneHasPicture|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhoneHasPicture[]    findAll()
 * @method PhoneHasPicture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneHasPictureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhoneHasPicture::class);
    }

    // /**
    //  * @return PhoneHasPicture[] Returns an array of PhoneHasPicture objects
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
    public function findOneBySomeField($value): ?PhoneHasPicture
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