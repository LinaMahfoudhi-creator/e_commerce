<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CartePostale;
use Doctrine\ORM\EntityManagerInterface;


#[Route('/panier')]
final class PanierController extends AbstractController
{
    #[Route('/{id}', name: 'ajouter_au_panier', methods: ['POST'])]
    public function ajouterAuPanier(int $id, Request $request, EntityManagerInterface $em): Response
{
    $session = $request->getSession();
    $quantity = (int) $request->request->get('quantity', 1);
    $panier = $session->get('panier', []);

    $carte = $em->getRepository(CartePostale::class)->find($id);

    if (!$carte) {
        $this->addFlash('error', 'Carte introuvable.');
        return $this->redirectToRoute('cards.list');
    }

    if (!isset($panier[$id])) {
        $panier[$id] = 0;
    }

    if ($panier[$id] + $quantity > $carte->getQuantiteStock()) {
        $this->addFlash('error', 'Quantité dépasse le stock disponible !');
    } else {
        $panier[$id] += $quantity;
        $session->set('panier', $panier);
        $this->addFlash('success', 'Carte ajoutée au panier !');
    }

    return $this->redirectToRoute('cards.detail', ['id' => $id]);
}











        // if (!$session->has('panier')) {
        //     $panierlocal[$id] = $quantity;

        // $session->set('panier', $panierlocal);
        // $this->addFlash('success', 'Carte ajoutée au panier !');
        // }else{
        //     $panierlocal = $session->get('panier');
        //     if (array_key_exists($id, $panierlocal)) {
        //         if($panierlocal[$id]+$quantity > $carte->getQuantiteStock()){
        //         $this->addFlash('error', 'Quantité depasse le stock !');}
        //         else{
        //         $panierlocal[$id] += $quantity;
        //     }} else {
        //                         if($panierlocal[$id]+$quantity > $carte->getQuantiteStock()){

        //         $panierlocal[$id] = $quantity;
        //     }
        
        // $session->set('panier', $panierlocal);
        // $this->addFlash('success', 'Carte ajoutée au panier !');}
        // }
    

    #[Route('/clear_session', name: 'clear')]
    public function clear_session(Request $request): Response
    {
        $session = $request->getSession();
        $session->clear(); // removes all session data

        // $session->remove('panier'); // removes the 'panier' key from the session
        // $session->invalidate(); // invalidates the session
        // $session->migrate(); // regenerates the session id
        // $session->clear(); // removes all session data
        $this->addFlash('success', 'Panier cleared !');
        return $this->redirectToRoute('cards.list');
    }


    #[Route('/acheter', name: 'panier.acheter')]
     public function acheter(Request $request, EntityManagerInterface $em,MailerService $mailer): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (empty($panier)) {
            $this->addFlash('error', 'Votre panier est vide. Ajoutez des cartes avant de passer à la caisse.');
            return $this->redirectToRoute('cards.list');
        }

        $cartes = $em->getRepository(CartePostale::class)->findBy([
            'id' => array_keys($panier)
        ]);

        $totalGlobal = 0;

        foreach ($cartes as $carte) {
            $id = $carte->getId();
            $quantity = $panier[$id];
            $total = $carte->getPrix() * $quantity;

            if ($carte->getQuantiteStock() < $quantity) {
                $this->addFlash('error', "Stock insuffisant pour la carte « {$carte->getName()} »");
                return $this->redirectToRoute('cards.detail', ['id' => $id]);
            }

            $carte->setQuantiteStock($carte->getQuantiteStock() - $quantity);
            $totalGlobal += $total;
        }
        $mailmessage = "
    <h2>Merci pour votre commande ! 🎉</h2>
    <p>Votre commande de ".$quantity." carte(s) de <strong>" . $carte->getName() . "</strong> a été <span style='color: green;'>validée avec succès</span>.</p>
     <p>Montant total : <strong style='color: blue;'>$total DT</strong></p>
    <p>Nous préparons vos articles avec soin et vous tiendrons informé dès qu'ils seront expédiés.</p>
    <p>Merci de votre confiance et à très bientôt !</p>
    <hr>
    <p>— L'équipe de RT2 e_commerce</p>
";
        ;





        $em->flush();
        $session->remove('panier'); // Optionally clear the cart
        $mailer->sendEmail(content: $mailmessage);
        return $this->render('panier/buy.html.twig', [
            'cartes' => $cartes,
            'panier' => $panier,
            'totalGlobal' => $totalGlobal,
            'session' => $session,
        ]);
    }


    

    #[Route('/voir', name: 'panier.voir')]
     public function voir(Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);
        // dd($panier);
        if (empty($panier)) {
            $this->addFlash('error', 'Votre panier est vide. Ajoutez des cartes avant de passer à la caisse.');
            return $this->redirectToRoute('cards.list');
        }

        $cartes = $em->getRepository(CartePostale::class)->findBy([
            'id' => array_keys($panier)
        ]);

        $totalGlobal = 0;

        foreach ($cartes as $carte) {
            $id = $carte->getId();
            $quantity = $panier[$id];
            $total = $carte->getPrix() * $quantity;

            if ($carte->getQuantiteStock() < $quantity) {
                $this->addFlash('error', "Stock insuffisant pour la carte « {$carte->getName()} »");
                return $this->redirectToRoute('cards.detail', ['id' => $id]);
            }

            $totalGlobal += $total;
        }

        return $this->render('panier/recap.html.twig', [
            'cartes' => $cartes,
            'session' => $session,
            'panier' => $panier,
            'totalGlobal' => $totalGlobal,
        ]);
    }
}
