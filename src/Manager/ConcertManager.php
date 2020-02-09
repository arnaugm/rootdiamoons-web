<?php

namespace App\Manager;

use App\Entity\Concert;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use App\Repository\ConcertRepository;
use Psr\Log\LoggerInterface;

class ConcertManager
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

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
     * @param EntityManagerInterface    $em
     * @param LoggerInterface           $logger
     */
    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->concertRepository = $em->getRepository(Concert::class);
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
