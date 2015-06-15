<?php

namespace AppBundle\Manager;

use Swift_Mailer;
use Swift_Message;

/**
 * Class SubscribeManager
 * @package AppBundle\Manager
 */
class SubscribeManager
{
    /**
     * @var Swift_Mailer
     */
    protected $mailer;

    /**
     * @var array
     */
    protected $subscribeAddresses;

    /**
     * @var array
     */
    protected $unsubscribeAddresses;

    /**
     * Constructor
     * @param Swift_Mailer $mailer
     * @param array        $subscribeAddresses
     * @param array        $unsubscribeAddresses
     */
    public function __construct(Swift_Mailer $mailer, array $subscribeAddresses, array $unsubscribeAddresses)
    {
        $this->mailer = $mailer;
        $this->subscribeAddresses = $subscribeAddresses;
        $this->unsubscribeAddresses = $unsubscribeAddresses;
    }

    public function subscribe($email)
    {
//        $cos = 'Mail de subscripcio ' . $lang . ' - ' . $email;
        $cos = 'Mail de subscripcio '.' - '.$email;

        $message = Swift_Message::newInstance()
            ->setSubject('Subscripcio')
            ->setFrom(array($email => $email))
            ->setTo(array_combine($this->subscribeAddresses, $this->subscribeAddresses))
            ->setBody($cos, 'text/html');

        $result = $this->mailer->send($message);

        return $result > 0;
    }

    public function unsubscribe($email)
    {
//        $cos = 'Mail de borrat ' . $lang . ' - ' . $email;
        $cos = 'Mail de borrat '.' - '.$email;

        $message = Swift_Message::newInstance()
            ->setSubject('Borrat')
            ->setFrom(array($email => $email))
            ->setTo(array_combine($this->unsubscribeAddresses, $this->unsubscribeAddresses))
            ->setBody($cos, 'text/html');

        $result = $this->mailer->send($message);

        return $result > 0;
    }
}