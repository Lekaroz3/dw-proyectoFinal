<?php

namespace App\Repository;

use App\Entity\ZapaPedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZapaPedidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZapaPedidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZapaPedidos[]    findAll()
 * @method ZapaPedidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZapaPedidosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZapaPedidos::class);
    }

    // /**
    //  * @return ZapaPedidos[] Returns an array of ZapaPedidos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ZapaPedidos
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
