<?php

namespace App\Controller;

use App\Entity\Partie;
use App\Form\PartieType;
use App\Repository\PartieRepository;
use App\Repository\PersonnageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/partie')]
class PartieController extends AbstractController
{
    #[Route('/', name: 'app_partie_index', methods: ['GET'])]
    public function index(PartieRepository $partieRepository): Response
    {
        return $this->render('partie/index.html.twig', [
            'parties' => $partieRepository->findAll(),
        ]);
    }
    #[Route('/partie/{id}', name: 'app_partie_en_cours', methods: ['POST'])]
    public function partieEnCours(Partie $partie, Request $request, EntityManagerInterface $entityManager, PersonnageRepository $personnageRep): Response
    {
        //On vide les persos a chaque entrée si jamais il revient en arrière pour pas cumuler les joueurs
        foreach ($partie->getPersonnages() as $key) {
            $partie->removePersonnage($key);
        }
        
        $quest = $request->request->all();
        foreach ($quest as $key => $value) {
          $personnage = $personnageRep->find($value);
          $partie->addPersonnage($personnage);
          $entityManager->persist($partie);
        } 
        $entityManager->flush();
        
        return $this->render('partie/en_cours.html.twig', [
            'partie' => $partie,
        ]);
    }

    #[Route('/new', name: 'app_partie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PartieRepository $partieRepository , EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $user->setRoles(['GAME_MASTER']);

        $entityManager->persist($user);
        $entityManager->flush();


        $partie = new Partie();
        $form = $this->createForm(PartieType::class, $partie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $partieRepository->add($partie);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_partie_show', ["id"=>$partie->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partie/new.html.twig', [
            'partie' => $partie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_partie_show', methods: ['GET'])]
    public function show(Partie $partie): Response
    {
        return $this->render('partie/show.html.twig', [
            'partie' => $partie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_partie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partie $partie, PartieRepository $partieRepository): Response
    {
        $form = $this->createForm(PartieType::class, $partie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partieRepository->add($partie);
            return $this->redirectToRoute('app_partie_show', ["id"=>$partie->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partie/edit.html.twig', [
            'partie' => $partie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_partie_delete', methods: ['POST'])]
    public function delete(Request $request, Partie $partie, PartieRepository $partieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partie->getId(), $request->request->get('_token'))) {
            $partieRepository->remove($partie);
        }

        return $this->redirectToRoute('app_partie_new', [], Response::HTTP_SEE_OTHER);
    }
}
