<?php

namespace App\Controller;

use App\Entity\CartePostale;
use App\Form\CartePostaleTypeForm;
use App\Service\TriPays;
use App\Service\TriRegion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/ecommerce')]
final class ECommerceController extends AbstractController
{
    #[Route('/', name: 'cards.list')]
    public function index(\Doctrine\Persistence\ManagerRegistry $doctrine, TriPays $pays,TriRegion $regions): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findAll();
        $this->addFlash('success', 'Welcome to the E-Commerce page!');
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes, 'pays'=>$pays->getPays(), 'regions'=>$regions->getPays(),
            
        ]);
    }
    #[Route('/{id<\d+>}', name: 'cards.detail')]
    public function detail(CartePostale $carte = null,Request $request): Response
    {
        if (!$carte) {
            $this->addFlash('error', 'Carte introuvable');
            return $this->redirectToRoute('cards.list');
        }
        dump($request);
        return $this->render('Cartes/detail.html.twig', [
            'carte' => $carte, 'isPaginated' => false,
            'session' => $request->getSession()

        ]);
    }
    #[Route('/paginated/{page?1}/{nbre?2}', name: 'cards.paginate')]
    public function paginated(\Doctrine\Persistence\ManagerRegistry $doctrine,$page,$nbre): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findBy([],[],$nbre,($page-1)*$nbre);
        $nbCartes=$repository->count([]);
        $nbrePage=ceil($nbCartes/$nbre);
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => true,
            'page' => $page,
            'nbrePage' => $nbrePage,
            'nbre' => $nbre,
        ]);
    }
    #[Route('/delete/{id?0}', name: 'cards.delete')]
    public function delete(\Doctrine\Persistence\ManagerRegistry $doctrine, CartePostale $carte = null): Response
    {
        if (!$carte) {
            $this->addFlash('error', 'Carte introuvable');
            return $this->redirectToRoute('cards.list');
        }
        $manager = $doctrine->getManager();
        $manager->remove($carte);
        $manager->flush();
        $this->addFlash('success', 'Carte supprimée avec succès');
        return $this->redirectToRoute('cards.list');
    }
    #[Route('/edit/{id?0}', name: 'cards.edit')]
    public function addCarte(ManagerRegistry $doctrine, Request $request,CartePostale $carte=null): Response
    {
        $new=false;
        if(!$carte){
            $carte=new CartePostale();
            $new=true;
        }

        $form = $this->createForm(CartePostaleTypeForm::class, $carte);

        $form->handleRequest($request);


        if($new){
            $message='Carte ajoutée avec succès';
        }
        else{
            $message='Carte modifiée avec succès';
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $doctrine->getManager();
            $manager->persist($carte);
            $manager->flush();
            $this->addFlash('success', $message);
            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/add.html.twig', [
            'Carte' => $carte,
            'form' => $form->createView(),
        ]);
    }
        #[Route('/orderAsc', name: 'cards.orderAsc')]
    public function orderAsc(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->orderbypriceAsc();
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => false,
        ]);
    }
    #[Route('/orderDesc', name: 'cards.orderDesc')]
    public function orderDesc(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->orderbypriceDesc();
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => false,
        ]);
    }
    #[Route('/Pays/{id?0}', name: 'cards.pays')]
    public function cardsByPays(\Doctrine\Persistence\ManagerRegistry $doctrine, $id,TriPays $pays,TriRegion $regions): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findAll();
        $cartesParPays = array_filter($cartes, function($carte) use ($id) {
            return $carte->getPaysId() == $id;
        });
        if (empty($cartesParPays)) {
            $this->addFlash('error', 'Aucune carte trouvée pour ce pays');
            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartesParPays,
            'isPaginated' => false,'pays'=>$pays->getPays(), 'regions'=>$regions->getPays(),
        ]);
    }
    #[Route('/Region/{id?0}', name: 'cards.region')]
    public function cardsByRegion(\Doctrine\Persistence\ManagerRegistry $doctrine, $id,TriPays $pays,TriRegion $regions): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findAll();
        $cartesParRegion = array_filter($cartes, function($carte) use ($id) {
            return $carte->getRegion()->getId() == $id;
        });
        if (empty($cartesParRegion)) {
            $this->addFlash('error', 'Aucune carte trouvée pour cette région');
            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartesParRegion,
            'isPaginated' => false,'pays'=>$pays->getPays(), 'regions'=>$regions->getPays(),
        ]);
    }
}
