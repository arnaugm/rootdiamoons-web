<?php

namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;

class ConcertManager
{
    /**
     * @var ObjectManager
     */
    protected $om;

    /**
     * @var EntityRepository
     */
    protected $concertRepository;

    /**
     * Constructor
     *
     * @param ObjectManager $om
     * @param $concertClass
     */
    public function __construct(ObjectManager $om, $concertClass)
    {
        $this->om = $om;
        $this->concertRepository = $om->getRepository($concertClass);
    }

    public function getNextConcerts()
    {
        return $this->concertRepository
            ->findNextConcerts();
    }
} 