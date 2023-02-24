<?php

namespace App\Controller;

use App\Entity\CommantairePublication;
use App\Entity\Publication;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\CommantairePublicationType;
use App\Repository\CommantairePublicationRepository;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



#[Route('/commantaire/publication')]
class CommantairePublicationController extends AbstractController
{
    #[Route('/', name: 'app_commantaire_publication_index', methods: ['GET'])]
    public function index(CommantairePublicationRepository $commantairePublicationRepository): Response
    {
        return $this->render('commantaire_publication/index.html.twig', [
            'commantaire_publications' => $commantairePublicationRepository->findAll(),
        ]);
    } 
    
    /////
    
    #[Route('/{id}', name: 'showcommentsforonepub', methods: ['GET'])]
    public function showcommm(CommantairePublicationRepository $commantairePublicationRepository,$id): Response
    {
        $pub=$this->getDoctrine()->getRepository(CommantairePublication::class)->findBy(['Publication'=>$id]);
        return $this->render('commantaire_publication/index.html.twig', [
            'commantaire_publications' => $commantairePublicationRepository->findBy(['id'=>$pub]),
        ]);
    }
    

    // #[Route('/new', name: 'app_commantaire_publication_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, CommantairePublicationRepository $commantairePublicationRepository): Response
    // {
    //     $commantairePublication = new CommantairePublication();
    //     $form = $this->createForm(CommantairePublicationType::class, $commantairePublication);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $commantairePublicationRepository->save($commantairePublication, true);

    //         return $this->redirectToRoute('app_commantaire_publication_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('commantaire_publication/new.html.twig', [
    //         'commantaire_publication' => $commantairePublication,
    //         'form' => $form,
    //     ]);
    // }
    #[Route('/{id}/new', name: 'app_commantaire_publication_new', methods: ['GET', 'POST'])]
    public function new(Request $request,ManagerRegistry $doctrine, CommantairePublicationRepository $commantairePublicationRepository,PublicationRepository $publicationRepository,$id): Response
    {
        
        $publication=$publicationRepository->find($id);
        // dd($publication);
        
        $commantairePublication = new CommantairePublication();
        $commantairePublication->setDateCommantaire(new \DateTime("now"));
        
        // dd($publication->getId());
        //echo $publication->__ToString();
       
        //$publication = new Publication();
        //$publication=$publicationRepository->findOneBy(['id'=>$id]);
       // dd($publication);
       $commantairePublication->setPublication($publication);
    //    dd($commantairePublication);
        //$commantairePublication
       
       
    
        $form = $this->createForm(CommantairePublicationType::class, $commantairePublication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commantairePublicationRepository->save($commantairePublication, true);
            return $this->redirectToRoute('app_commantaire_publication_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('commantaire_publication/new.html.twig', [
            'commantaire_publication' => $commantairePublication,
            'form' => $form
        ]);
        //dd($commantairePublication);
        
    }

    #[Route('/{id}', name: 'app_commantaire_publication_show', methods: ['GET'])]
    public function show(CommantairePublication $commantairePublication): Response
    {
        
        return $this->render('commantaire_publication/show.html.twig', [
            'commantaire_publication' => $commantairePublication,
        ]);
    }
    
    #[Route('/{id}', name: 'app_commantaire_publication', methods: ['GET'])]
    public function showComments(CommantairePublication $commantairePublication): Response
    {
        return $this->render('commantaire_publication/show.html.twig', [
            'commantaire_publication' => $commantairePublication,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commantaire_publication_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommantairePublication $commantairePublication, CommantairePublicationRepository $commantairePublicationRepository): Response
    {
        $form = $this->createForm(CommantairePublicationType::class, $commantairePublication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commantairePublicationRepository->save($commantairePublication, true);

            return $this->redirectToRoute('app_commantaire_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commantaire_publication/edit.html.twig', [
            'commantaire_publication' => $commantairePublication,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commantaire_publication_delete', methods: ['POST'])]
    public function delete(Request $request, CommantairePublication $commantairePublication, CommantairePublicationRepository $commantairePublicationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commantairePublication->getId(), $request->request->get('_token'))) {
            $commantairePublicationRepository->remove($commantairePublication, true);
        }

        return $this->redirectToRoute('app_commantaire_publication_index', [], Response::HTTP_SEE_OTHER);
    }
}