<?php

namespace AppBundle\Manager;

use Exception;
use AppBundle\Repository\ConcertRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Monolog\Logger;

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
     * @var Logger
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param ObjectManager $om
     * @param               $concertClass
     * @param Logger        $logger
     */
    public function __construct(ObjectManager $om, $concertClass, Logger $logger)
    {
        $this->om = $om;
        $this->concertRepository = $om->getRepository($concertClass);
        $this->logger = $logger;
    }

    public function getNextConcerts()
    {
        try {
            return $this->concertRepository
                ->findNextConcerts();

        } catch (Exception $e) {
            $this->logger->critical('Error fetching next concerts: '.$e->getMessage());

            return array();
        }
    }

    public function getPastConcerts()
    {
        try {
            return $this->concertRepository
                ->findPastConcerts();

        } catch (Exception $e) {
            $this->logger->critical('Error fetching past concerts: '.$e->getMessage());

            return array();
        }
    }
}
