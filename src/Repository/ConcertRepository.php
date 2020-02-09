<?php

namespace App\Repository;

use App\Entity\Concert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concert::class);
    }

    public function findNextConcerts()
    {
        $qb = $this->createQueryBuilder('c');

        $qb = $qb->select()
            ->where('c.data > CURRENT_DATE()')
            ->andWhere('c.cancelat = 0')
            ->orderBy('c.data', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function findPastConcerts()
    {
        $qb = $this->createQueryBuilder('c');

        $qb = $qb->select()
            ->where('c.data <= CURRENT_DATE()')
            ->andWhere('c.cancelat = 0')
            ->orderBy('c.data', 'DESC');

        return $qb->getQuery()->getResult();
    }
}