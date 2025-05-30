<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    public function __construct(private MailerInterface $mailer)
    {
    }
    public function sendEmail(
        $to ='mahdizamni83@gmail.com',
        $content='<p>See Twig integration for better HTML integration!</p>',
        $subject='Confirmation de commande'
    ): void
    {
        $email = (new Email())
            ->from('zamnirihab42@gmail.com')
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text('Sending emails is fun again!')
            ->html($content);

        try {
            $this->mailer->send($email);
        } catch (\Exception $e) {
            // Log l'erreur ou affiche-la pour debug
            dump('Erreur lors de l\'envoi du mail : ' . $e->getMessage());
            // Tu peux aussi throw $e; pour voir l’erreur remonter en dev
        }
    }



}