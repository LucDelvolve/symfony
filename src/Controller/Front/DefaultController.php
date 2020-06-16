<?php

namespace App\Controller\Front;

use App\Service\NotificationService;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller\Front
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_index", methods={"GET"})
     */
    public function index(MailerInterface $mailer, NotificationService $notification): Response
    {
        //$notification->send("nouvelle notif !!!!");
        //$this->addFlash('error', 'mon message de mon flashmessage');

        return $this->render('front/default/index.html.twig');
    }
}
