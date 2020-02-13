<?php

namespace App\Manager;

use Exception;
use Psr\Log\LoggerInterface;
use Swift_Mailer;
use Swift_Message;

class SubscribeManager
{
    /**
     * @var Swift_Mailer
     */
    protected $mailer;

    /**
     * @var LoggerInterface
     */
    protected $logger;

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
     * @param Swift_Mailer      $mailer
     * @param LoggerInterface   $logger
     * @param array             $subscribeAddresses
     * @param array             $unsubscribeAddresses
     */
    public function __construct(
        Swift_Mailer $mailer,
        LoggerInterface $logger,
        array $subscribeAddresses,
        array $unsubscribeAddresses
    ) {
        $this->mailer = $mailer;
        $this->logger = $logger;
        $this->subscribeAddresses = $subscribeAddresses;
        $this->unsubscribeAddresses = $unsubscribeAddresses;
    }

    /**
     * Send subscription email
     *
     * @param string $email
     * @param string $lang
     * @return bool
     */
    public function subscribe($email, $lang)
    {
        $cos = 'Mail de subscripció '.$lang.' - '.$email;

        $message = (new Swift_Message('Subscripció'))
            ->setFrom($email)
            ->setTo($this->subscribeAddresses)
            ->setBody($cos);

        try {
            $result = $this->mailer->send($message);

        } catch (Exception $e) {
            $this->logger->critical('Error sending subscription email: '.$e->getMessage());

            return false;
        }

        if ($result <= 0) {
            $this->logger->critical('Subscription email not sent: '.$message->toString());
        }

        return $result > 0;
    }

    /**
     * Send unsubscription email
     *
     * @param string $email
     * @param string $lang
     * @return bool
     */
    public function unsubscribe($email, $lang)
    {
        $cos = 'Mail de borrat '.$lang.' - '.$email;

        $message = (new Swift_Message('Borrat'))
            ->setFrom($email)
            ->setTo($this->unsubscribeAddresses)
            ->setBody($cos);

        try {
            $result = $this->mailer->send($message);

        } catch (Exception $e) {
            $this->logger->critical('Error sending unsubscription email: '.$e->getMessage());

            return false;
        }

        if ($result <= 0) {
            $this->logger->critical('Unsubscription email not sent: '.$message->toString());
        }

        return $result > 0;
    }
}