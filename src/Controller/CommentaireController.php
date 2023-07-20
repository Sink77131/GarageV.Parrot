<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]

    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentaire = new Commentaire();
       
        $form = $this->createForm(CommentaireType::class, $commentaire);
        
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaire);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_commentaire');
        }
        
    
        return $this->render('commentaire/Accueil.html.twig', [
            'form' => $form->createView(),

        ]);

    }
}
