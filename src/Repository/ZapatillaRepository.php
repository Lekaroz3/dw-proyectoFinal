<?php

namespace App\Repository;

use App\Entity\Zapatilla;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zapatilla|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zapatilla|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zapatilla[]    findAll()
 * @method Zapatilla[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZapatillaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zapatilla::class);
    }

    // /**
    //  * @return Zapatilla[] Returns an array of Zapatilla objects
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
    public function findOneBySomeField($value): ?Zapatilla
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function findOrderByPrice() {
        return $this->createQueryBuilder('z')->select('e')->from('App:Zapatilla', 'e')
                ->orderBy('e.precio','ASC')->getQuery()->getResult();
    }
    
    public function findByCategory($categoria) {
        return $this->createQueryBuilder('z')->select('e')->from('App:Zapatilla', 'e')->where('e.categoria','==',$categoria)
                ->orderBy('e.precio','ASC')->getQuery()->getResult();
    }
    
     function getAllZapaByCategory($categoria){
     $query = $this->getEntityManager()
      ->createQuery(
        'SELECT o FROM App:Zapatilla o
        JOIN o.categoria e
        WHERE e.id = :categoria'
      )->setParameter('categoria', $categoria);
    return $query->getResult();
  }
}
