<?php

namespace App\Manager;

use Exception;
use App\Repository\ConcertRepository;
use Psr\Log\LoggerInterface;

class ConcertManager
{
    /**
     * @var ConcertRepository
     */
    protected $concertRepository;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param ConcertRepository         $concertRepository
     * @param LoggerInterface           $logger
     */
    public function __construct(ConcertRepository $concertRepository, LoggerInterface $logger)
    {
        $this->concertRepository = $concertRepository;
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
