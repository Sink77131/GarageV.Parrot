<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Form\LoginType;
use App\Repository\CommentaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class VehiculeController extends AbstractController
{
    #[Route('/vehicule', name: 'app_vehicule')]
    public function vehicule(Request $request, CommentaireRepository $commentaireRepository, EntityManagerInterface $entityManager): Response
    {
        $commentaires = $commentaireRepository->findAll();

        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $loginForm = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_vehicule');
        }

        return $this->render('/commentaire/Vehicule.html.twig', [
            'commentaires' => $commentaires,
            'form' => $form->createView(),
            'loginForm' => $loginForm->createView(),
        ]);
    }
}
