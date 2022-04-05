<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Form\PersonnageType;
use App\Repository\PersonnageRepository;
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

    #[Route('/new', name: 'personnage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        $personnage = new Personnage();
        $form = $_POST;  
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid() && $request->request->get('_valid')) {
            dump($form->getData());
            $specialite = [$form->get('specialites1')->getData(),$form->get('specialites2')->getData()];
            $personnage->setSpecialite($specialite);
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
                $pdf->Cell(17,10,utf8_decode('Nom'),'');
                $pdf->Ln(7);
                $x += 2;
                $pdf->SetLeftMargin($x);
                $pdf->Cell(17,10,utf8_decode('Culture'),'');
                $x += 85;
                $pdf->SetLeftMargin($x);
                $pdf->Cell(17,10,utf8_decode('Standart'),'');
                $x -= 66;
                $pdf->SetLeftMargin($x);
                $pdf->Ln(9);
                $pdf->MultiCell(110,7,'Avantage culturel zejbdezjd ozeid zeo dozei dzeio dozie dozedzoiedozedziediozdz edize dize dze  dize dize doized');

                //créer le pdf
                $pdfFilepath = '../public/fichesPersoVierge/recto1'/*.date('Y-m-d-H-i-s')*/.'.pdf';
               // $pdf->Output( $pdfFilepath ,'I');
            $entityManager->persist($personnage);
            $entityManager->flush();
           // return $this->redirectToRoute('personnage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personnage/new.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
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
}
