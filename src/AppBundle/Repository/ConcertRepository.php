<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ConcertRepository extends EntityRepository
{
    public function findNextConcerts()
    {
        $qb = $this->createQueryBuilder('c');

        $qb = $qb->select('c.data, c.lloc, c.textCat')
            ->where('c.data > CURRENT_DATE()')
            ->andWhere('c.cancelat = 0')
            ->orderBy('c.data', 'ASC');

        return $qb->getQuery()->getResult();
    }
}