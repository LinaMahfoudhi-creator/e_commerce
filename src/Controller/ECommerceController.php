<?php

namespace App\Controller;

use App\Entity\CartePostale;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/ecommerce')]
final class ECommerceController extends AbstractController
{
    #[Route('/', name: 'cardes.list')]
    public function index(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findAll();
        $this->addFlash('success', 'Welcome to the E-Commerce page!');
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
        ]);
    }
}
