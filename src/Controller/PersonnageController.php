<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Entity\Armes;
use App\Form\PersonnageType;
use App\Repository\PartieRepository;
use App\Repository\PersonnageRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Fpdf\Fpdf;

#[Route('/personnage')]
class PersonnageController extends AbstractController
{
    #[Route('/', name: 'personnage_index', methods: ['GET'])]
    public function index(PersonnageRepository $personnageRepository): Response
    {
        return $this->render('personnage/index.html.twig', [
            'personnages' => $personnageRepository->findAll(),
        ]);
    }

   
    #[Route('/new/{id?null}/{partie_id?null}', name: 'personnage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,$id,$partie_id,UserRepository $userRep, PartieRepository $partieRep): Response
    {
        // Si il y a un ID la création vient d'un GM, sinon c'est le joueur qui cree sa fiche
        $id ? $joueur =$userRep->find($id): $joueur= $this->getUser();
        //On recup la partie pour l'ajouter au personnage si j'ajout vient du GM
        $partie_id ? $partie =$partieRep->find($partie_id): $partie= null;
        
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->request->get('_valid')) {
            //PARTIE ARMES **************
            $tabArmes = $form->get('armes')->getData();
            $allArmes= explode(",", $tabArmes);
            foreach ($allArmes as $armes){
                $Armes = new Armes();
                $Armes->SetPersonnage($personnage);
                $arme = substr($armes,0,-1);
                $AllCompetenceArmes = explode("(", $arme);
                $Armes->setArme($AllCompetenceArmes[0]);
                $Armes->setCompetence($AllCompetenceArmes[1]);
                $entityManager->persist($Armes);
            }
            //**************
            $specialite = [$form->get('specialites1')->getData(),$form->get('specialites2')->getData()];
            $personnage->setSpecialite($specialite)
                       ->setJoueur($joueur);
         

            $entityManager->persist($personnage);
            $entityManager->flush();


            if ($id) {
                return $this->redirectToRoute('app_partie_show', ['id'=>$partie_id], Response::HTTP_SEE_OTHER);
            }else{
                return $this->redirectToRoute('personnage_generate_fiche', ['id'=>$personnage->getId()], Response::HTTP_SEE_OTHER);
            }
        }
        if ($id) {
            return $this->renderForm('personnage/new.html.twig', [
                'personnage' => $personnage,
                'form' => $form,
                'user'=>$joueur
            ]);
        }else{
            return $this->renderForm('personnage/new.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
        }
        
    }

    #[Route('/{id}', name: 'personnage_show', methods: ['GET'])]
    public function show(Personnage $personnage): Response
    {
        return $this->render('personnage/show.html.twig', [
            'personnage' => $personnage,
        ]);
    }

    #[Route('/{id}/edit', name: 'personnage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Personnage $personnage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('personnage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personnage/edit.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'personnage_delete', methods: ['POST'])]
    public function delete(Request $request, Personnage $personnage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($personnage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personnage_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/generate', name: 'personnage_generate_fiche', methods: ['GET'])]
    public function generate(Request $request, Personnage $personnage, EntityManagerInterface $entityManager): Response
    {
        $pdf = new \FPDF();
            //$pdf->AddPage();
            //  $y = $pdf->getY();
            $x = $pdf->getX();
            $x +=10;
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->Ln(23);
            $x += 24;
            $pdf->SetLeftMargin($x);
            $pdf->Image('./fichesPersoVierge/recto-fiche.png',0,0,210);
            $pdf->SetFont('Times','',12);
            $pdf->Cell(17,10,utf8_decode($personnage->getNom()),'');
            $pdf->Ln(7);
            $x += 2;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getClasse()),'');
            $x += 85;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getStandardDeVie()),'');
            $x -= 66;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(9);
            $pdf->MultiCell(110,7,utf8_decode($personnage->getAvantageCulturel()));
            $x -= 18;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(6);
            $pdf->Cell(17,10,utf8_decode($personnage->getStandardDeVie()),'');
            $x += 90;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getPartOmbre()),'');

            //créer le pdf
            $pdfFilepath = '../public/fichesPersoVierge/recto1'/*.date('Y-m-d-H-i-s')*/.'.pdf';
            $pdf->Output( $pdfFilepath ,'I');
    }
}
