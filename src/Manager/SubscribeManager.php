<?php

namespace App\Manager;

use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SubscribeManager
{
    /**
     * @var MailerInterface
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
     * @param MailerInterface   $mailer
     * @param LoggerInterface   $logger
     * @param array             $subscribeAddresses
     * @param array             $unsubscribeAddresses
     */
    public function __construct(
        MailerInterface $mailer,
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

        $email = (new Email())
            ->from(array($email => $email))
            ->to(array_combine($this->subscribeAddresses, $this->subscribeAddresses))
            ->subject('Subscripció')
            ->html($cos);

        try {
            $result = $this->mailer->send($email);

        } catch (Exception $e) {
            $this->logger->critical('Error sending subscription email: '.$e->getMessage());

            return false;
        }

        if ($result <= 0) {
            $this->logger->critical('Subscription email not sent: '.$email->toString());
        }

        return $result > 0;
    }

    /**
     * Send unsubscription email
     *
     * @param string $email
     * @param string $lang
     * @return bool
     * @throws TransportExceptionInterface
     */
    public function unsubscribe($email, $lang)
    {
        $cos = 'Mail de borrat '.$lang.' - '.$email;

        $email = (new Email())
            ->from(array($email => $email))
            ->to(array_combine($this->unsubscribeAddresses, $this->unsubscribeAddresses))
            ->subject('Borrat')
            ->html($cos);

        try {
            $result = $this->mailer->send($email);

        } catch (Exception $e) {
            $this->logger->critical('Error sending unsubscription email: '.$e->getMessage());

            return false;
        }

        if ($result <= 0) {
            $this->logger->critical('Unsubscription email not sent: '.$email->toString());
        }

        return $result > 0;
    }
}