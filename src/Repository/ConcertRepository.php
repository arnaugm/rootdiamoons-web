<?php

namespace App\Repository;

use App\Entity\Concert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Concert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concert[]    findAll()
 * @method Concert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concert::class);
    }

    public function findNextConcerts()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.data > CURRENT_DATE()')
            ->andWhere('c.cancelat = 0')
            ->orderBy('c.data', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findPastConcerts()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.data <= CURRENT_DATE()')
            ->andWhere('c.cancelat = 0')
            ->orderBy('c.data', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
