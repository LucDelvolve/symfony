<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function show(): Response
    {
        return $this->render('front/user/index.html.twig', [
            'users' => $this->getDoctrine()->getManager()->getRepository(User::class)->findAll(),
        ]);
    }
}
