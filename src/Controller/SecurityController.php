<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;


final class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $this->addFlash('info', 'You are already logged in!');
           return $this->redirectToRoute('cards.list');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/log_out', name: 'app_logout')]
    public function logout(): void
    {
        $this->addFlash('success', 'You have been logged out successfully.');
    }
    #[Route(path: '/Profile', name: 'app_profile')]
    public function profile(Request $request): Response
    {    $user = $this->getUser();

        if (!$user) {
            $request->getSession()->set('_security.main.target_path', $request->getUri());
            return $this->redirectToRoute('app_login');
        }
        return $this->render('user/profile.html.twig');
    }
}
