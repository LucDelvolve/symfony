<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class NotificationService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send($text)
    {
        $email = (new TemplatedEmail())
            ->from('noreply.fryzzer@gmail.com')
            ->to('amorin@vetixy.com')
            ->subject('Time for Symfony Mailer!')
            ->htmlTemplate('emails/notification.html.twig')
            ->context([
                'text' => $text,
            ]);

        $sentEmail = $this->mailer->send($email);
    }
}