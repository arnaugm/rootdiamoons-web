<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SubscribeType;
use AppBundle\Form\Type\UnsubscribeType;
use AppBundle\Manager\ConcertManager;
use AppBundle\Manager\RecopManager;
use AppBundle\Manager\SubscribeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @var SubscribeManager
     */
    protected $subscribeManager;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->concertManager = $this->get('rootdiamoons_web.manager.concert');
        $this->recopManager = $this->get('rootdiamoons_web.manager.recop');
        $this->subscribeManager = $this->get('rootdiamoons_web.manager.subscribe');
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
        return $this->render('AppBundle::contact.html.twig');
    }

    public function issuuAction()
    {
        return $this->render('AppBundle::issuu.html.twig');
    }

    public function mailingListAction(Request $request)
    {
        $subscribeForm = $this->createForm(new SubscribeType());

        $unsubscribeForm = $this->createForm(new UnsubscribeType());

        $subscribeForm->handleRequest($request);
        $unsubscribeForm->handleRequest($request);

        if ($subscribeForm->get('send')->isClicked() && $subscribeForm->isValid()) {
            $data = $subscribeForm->getData();
            $email = $data['email'];

            $result = $this->subscribeManager->subscribe($email);

            return $this->render('AppBundle::subscribed.html.twig', array(
                'error' => !$result,
                'email' => $email,
            ));
        }

        if ($unsubscribeForm->get('send')->isClicked() && $unsubscribeForm->isValid()) {
            $data = $unsubscribeForm->getData();
            $email = $data['email'];

            $result = $this->subscribeManager->unsubscribe($email);

            return $this->render('AppBundle::unsubscribed.html.twig', array(
                'error' => !$result,
                'email' => $email,
            ));
        }

        return $this->render('AppBundle::mailing_list.html.twig', array(
            'subscribeForm' => $subscribeForm->createView(),
            'unsubscribeForm' => $unsubscribeForm->createView(),
        ));
    }
}
