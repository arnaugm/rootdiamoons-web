<?php

namespace App\Controller;

use App\Form\Type\SubscribeType;
use App\Form\Type\UnsubscribeType;
use App\Manager\ConcertManager;
use App\Manager\RecopManager;
use App\Manager\StreamingPlatformManager;
use App\Manager\SubscribeManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends AbstractController
{
    public function homepage(ConcertManager $concertManager)
    {
        $nextConcerts = $concertManager->getNextConcerts();

        return $this->render('home.html.twig', array('nextConcerts' => $nextConcerts));
    }

    public function music(RecopManager $recopManager, StreamingPlatformManager $streamingPlatformManager)
    {
        $recops = $recopManager->getRecops();
        $platforms = $streamingPlatformManager->getPlatforms();

        return $this->render('music.html.twig', array('recops' => $recops, 'platforms' => $platforms));
    }

    public function videos()
    {
        return $this->render('videos.html.twig');
    }

    public function concerts(ConcertManager $concertManager)
    {
        $nextConcerts = $concertManager->getNextConcerts();
        $pastConcerts = $concertManager->getPastConcerts();

        return $this->render(
            'concerts.html.twig',
            array(
                'nextConcerts' => $nextConcerts,
                'pastConcerts' => $pastConcerts,
            )
        );
    }

    public function photos()
    {
        return $this->render('photos.html.twig');
    }

    public function downloadImg(Request $request)
    {
        $img = $request->query->get('img');

        // check the file contains the extension .jpg, .jpeg or .png
        if ((stripos(strrev($img), strrev('.jpg')) !== 0) &&
            (stripos(strrev($img), strrev('.jpeg')) !== 0) &&
            (stripos(strrev($img), strrev('.png')) !== 0)
        ) {
            throw new NotFoundHttpException();
        }

        $file = $request->server->get('DOCUMENT_ROOT').$img;

        // check the file exists
        if (!is_file($file)) {
            throw new NotFoundHttpException();
        }

        $response = new BinaryFileResponse($file);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            basename($file)
        );
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }

    public function band()
    {
        return $this->render('band.html.twig');
    }

    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    public function mailingList(Request $request, SubscribeManager $subscribeManager)
    {
        $subscribeForm = $this->createForm(SubscribeType::class);

        $unsubscribeForm = $this->createForm(UnsubscribeType::class);

        $subscribeForm->handleRequest($request);
        $unsubscribeForm->handleRequest($request);

        if ($subscribeForm->get('send')->isClicked() && $subscribeForm->isValid()) {
            $data = $subscribeForm->getData();
            $email = $data['email'];

            $result = $subscribeManager->subscribe($email, $request->getLocale());

            return $this->render(
                'subscribed.html.twig',
                array(
                    'error' => !$result,
                    'email' => $email,
                )
            );
        }

        if ($unsubscribeForm->get('send')->isClicked() && $unsubscribeForm->isValid()) {
            $data = $unsubscribeForm->getData();
            $email = $data['email'];

            $result = $subscribeManager->unsubscribe($email, $request->getLocale());

            return $this->render(
                'unsubscribed.html.twig',
                array(
                    'error' => !$result,
                    'email' => $email,
                )
            );
        }

        return $this->render(
            'mailing_list.html.twig',
            array(
                'subscribeForm' => $subscribeForm->createView(),
                'unsubscribeForm' => $unsubscribeForm->createView(),
            )
        );
    }
}
