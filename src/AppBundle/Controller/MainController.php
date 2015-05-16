<?php

namespace AppBundle\Controller;

use AppBundle\Manager\ConcertManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MainController extends Controller
{
    /**
     * @var ConcertManager
     */
    protected $concertManager;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->concertManager = $this->get('rootdiamoons_web.manager.concert');
    }

    public function homepageAction()
    {
        $nextConcerts = $this->concertManager->getNextConcerts();

        return $this->render('AppBundle::home.html.twig', array('nextConcerts' => $nextConcerts));
    }
}
