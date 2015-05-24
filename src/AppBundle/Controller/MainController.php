<?php

namespace AppBundle\Controller;

use AppBundle\Manager\ConcertManager;
use AppBundle\Manager\RecopManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MainController extends Controller
{
    /**
     * @var ConcertManager
     */
    protected $concertManager;

    /**
     * @var RecopManager
     */
    protected $recopManager;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->concertManager = $this->get('rootdiamoons_web.manager.concert');
        $this->recopManager = $this->get('rootdiamoons_web.manager.recop');
    }

    public function homepageAction()
    {
        $nextConcerts = $this->concertManager->getNextConcerts();

        return $this->render('AppBundle::home.html.twig', array('nextConcerts' => $nextConcerts));
    }

    public function musicAction()
    {
        $recops = $this->recopManager->getRecops();

        return $this->render('AppBundle::music.html.twig', array('recops' => $recops));
    }

    public function videosAction()
    {
        return $this->render('AppBundle::videos.html.twig');
    }

    public function concertsAction()
    {
        $nextConcerts = $this->concertManager->getNextConcerts();
        $pastConcerts = $this->concertManager->getPastConcerts();

        return $this->render('AppBundle::concerts.html.twig', array(
            'nextConcerts' => $nextConcerts,
            'pastConcerts' => $pastConcerts,
        ));
    }

    public function photosAction()
    {
        return $this->render('AppBundle::photos.html.twig');
    }

    public function bandAction()
    {
        return $this->render('AppBundle::band.html.twig');
    }

    public function contactAction()
    {
    }
}
