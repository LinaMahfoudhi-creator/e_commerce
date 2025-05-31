<?php

namespace App\Controller;

use App\Entity\CartePostale;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;

final class PdfGeneratorController extends AbstractController
{
    #[Route('/pdf/generator', name: 'app_pdf_generator')]
    public function index(Request $request, EntityManagerInterface $em,): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);


        $cartes = $em->getRepository(CartePostale::class)->findBy([
            'id' => array_keys($panier)
        ]);

        $totalGlobal = 0;

        foreach ($cartes as $item) {
            $id = $item->getId();
            $quantity = $panier[$id];
            $totalGlobal += $item->getPrix() * $quantity;
        }
        $data=[
            'cartes' => $cartes,
            'totalGlobal' => $totalGlobal,
            'panier' => $panier];

        $html = '<html><head><title>My PDF</title></head><body><h1>Hello from static HTML</h1></body></html>';
        //$html =  $this->renderView('panier/pdf.html.twig',$data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        return new Response (
            $dompdf->stream('votre commande'
                , ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }
}
