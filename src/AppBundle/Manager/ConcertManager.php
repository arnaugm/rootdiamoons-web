<?php

namespace AppBundle\Manager;

use AppBundle\Repository\ConcertRepository;
use Doctrine\Common\Persistence\ObjectManager;

class ConcertManager
{
    /**
     * @var ObjectManager
     */
    protected $om;

    /**
     * @var ConcertRepository
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

    public function getPastConcerts()
    {
        return $this->concertRepository
            ->findPastConcerts();
    }
} 