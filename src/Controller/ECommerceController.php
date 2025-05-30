<?php

namespace App\Controller;

use App\Entity\CartePostale;
use App\Entity\Region;
use App\Form\CartePostaleTypeForm;
use App\Form\RegionTypeForm;
use App\Service\TriPays;
use App\Service\TriRegion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/ecommerce')]
final class ECommerceController extends AbstractController
{
    public function __construct(private TriPays $pays, private TriRegion $regions)
    {
        // Constructor can be used for dependency injection if needed
    }
    #[Route('/', name: 'cards.list')]
    public function index(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findAll();
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes, 'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
            
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
            'session' => $request->getSession(),'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),

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
            'nbre' => $nbre,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/delete/{id?0}', name: 'cards.delete')]
    public function delete(\Doctrine\Persistence\ManagerRegistry $doctrine, CartePostale $carte = null): Response
    {   $user = $this->getUser();
        if (!$user) {
        $this->addFlash('error', "Access denied");
        return $this->redirectToRoute('cards.list');
    }
        if(!in_array('ROLE_ADMIN', $user->getRoles())){
            $this->addFlash('error', "Access denied");
            return $this->redirectToRoute('cards.list');
        }
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
    public function addCarte(ManagerRegistry $doctrine, Request $request,CartePostale $carte=null,SluggerInterface $slugger): Response
    {  $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', "access denied");
            return $this->redirectToRoute('cards.list');
        }
        if(!in_array('ROLE_ADMIN', $user->getRoles())){
            $this->addFlash('error', "access denied");
            return $this->redirectToRoute('cards.list');
        }
        $new=false;
        if(!$carte){
            $carte=new CartePostale();
            $new=true;
        }

        $form = $this->createForm(CartePostaleTypeForm::class, $carte);
        $form->remove('imagefront');
        $form->remove('imageback');

        $form->handleRequest($request);

        if($new){
            $message='Carte ajoutée avec succès';
        }
        else{
            $message='Carte modifiée avec succès';
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();
            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $image->move($this->getParameter('carte_directory'), $newFilename);
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $carte->setImagefront(substr($newFilename, 0, -4));
            }
            $manager = $doctrine->getManager();
            $manager->persist($carte);
            $manager->flush();
            $this->addFlash('success', $message);

            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/add.html.twig', [
            'Carte' => $carte,
            'form' => $form->createView(),'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
        #[Route('/orderAsc', name: 'cards.orderAsc')]
    public function orderAsc(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->orderbypriceAsc();
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => false,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/orderDesc', name: 'cards.orderDesc')]
    public function orderDesc(\Doctrine\Persistence\ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->orderbypriceDesc();
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => false,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/Pays/{id?0}', name: 'cards.pays')]
    public function cardsByPays(\Doctrine\Persistence\ManagerRegistry $doctrine, $id,): Response
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
            'isPaginated' => false,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/Region/{id?0}', name: 'cards.region')]
    public function cardsByRegion(\Doctrine\Persistence\ManagerRegistry $doctrine, $id): Response
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
            'isPaginated' => false,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/addRegion', name: 'cards.addRegion')]
    public function addRegion(ManagerRegistry $doctrine, Request $request): Response
    {
        $region=new region();
        $form = $this->createForm(RegionTypeForm::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $doctrine->getManager();
            $manager->persist($region);
            $manager->flush();
            $this->addFlash('success', 'Région ajoutée avec succès');
            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/addRegion.html.twig', [
            'form' => $form->createView(), 'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
    #[Route('/search', name: 'cards.search',methods: ['GET', 'POST'])]
    public function search(\Doctrine\Persistence\ManagerRegistry $doctrine, Request $request): Response
    {
        $searchTerm = $request->request->get('q');
        if (!$searchTerm) {
            $this->addFlash('error', 'Veuillez entrer un terme de recherche');
            return $this->redirectToRoute('cards.list');
        }
        $repository = $doctrine->getRepository(CartePostale::class);
        $cartes = $repository->findByname($searchTerm);
        if (empty($cartes)) {
            $this->addFlash('error', 'Aucune carte trouvée pour ce terme de recherche');
            return $this->redirectToRoute('cards.list');
        }
        return $this->render('Cartes/index.html.twig', [
            'cartes' => $cartes,
            'isPaginated' => false,'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
}
