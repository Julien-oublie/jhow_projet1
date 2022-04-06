<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Entity\Armes;
use App\Entity\AttributAmeliores;
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
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->request->get('_valid')) {
            dump($form->getData());
            /*********ARMES********* */
            $tabArmes = $form->get('armes')->getData();
            $allArmes= explode(",", $tabArmes);
            $allCompetence = [];
            foreach ($allArmes as $armes){
                $Armes = new Armes();
                $Armes->SetPersonnage($personnage);
                $arme = substr($armes,0,-1);
                $AllCompetenceArmes = explode("(", $arme);
                $Armes->setArme($AllCompetenceArmes[0]);
                $Armes->setCompetence($AllCompetenceArmes[1]);
                $entityManager->persist($Armes);
            }
            /*********ARMES********* */
            /*********ATTRIBUT AMELIORES**********/
            $attributAmeliores = new AttributAmeliores();
            $attributAmeliores->setCorps($form->get('attributCorps')->getData());
            $attributAmeliores->setCoeur($form->get('attributCoeur')->getData());
            $attributAmeliores->setEsprit($form->get('attributEsprit')->getData());
            $entityManager->persist($attributAmeliores);
            /*********ATTRIBUT AMELIORES**********/
            $specialite = [$form->get('specialites1')->getData(),$form->get('specialites2')->getData()];
            $personnage->setSpecialite($specialite);
            $entityManager->persist($personnage);
            $entityManager->flush();
            return $this->redirectToRoute('personnage_generate_fiche', ['id'=>$personnage->getId()], Response::HTTP_SEE_OTHER);
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

    #[Route('/{id}/generate', name: 'personnage_generate_fiche', methods: ['POST','GET'])]
    public function generate(Request $request, Personnage $personnage, EntityManagerInterface $entityManager): Response
    {
       /* $specialites = '';
        foreach ($personnage->getSpecialite() as  $specialite) {
            $specialites .= $specialite;
            $specialites .= ',';
        }
        dump($specialites);*/
        $inspiration = str_repeat('X ',$personnage->getInspiration());
        $admiration = str_repeat('X ',$personnage->getAdmiration());
        $persuasion = str_repeat('X ',$personnage->getPersuasion());
        $athletisme =  str_repeat('X ',$personnage->getAthletisme());
        $voyage =  str_repeat('X ',$personnage->getVoyage());
        $furtive =  str_repeat('X ',$personnage->getFurtivite());
        $conscience =  str_repeat('X ',$personnage->getConscience());
        $perspicacite =  str_repeat('X ',$personnage->getPerspicacite());
        $fouille =  str_repeat('X ',$personnage->getFouille());
        $exploration =  str_repeat('X ',$personnage->getExploration());
        $guerison =  str_repeat('X ',$personnage->getGuerison());
        $chasse = str_repeat('X ',$personnage->getChasse());
        $chant = str_repeat('X ',$personnage->getChant());
        $courtois = str_repeat('X ',$personnage->getCourtoisie());
        $enigmes = str_repeat('X ',$personnage->getEnigmes());
        $artisanat = str_repeat('X ',$personnage->getArtisanat());
        $combat = str_repeat('X ',$personnage->getCombat());
        $conaissances = str_repeat('X ',$personnage->getConaissances());

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
            $pdf->Cell(110,7,utf8_decode($personnage->getAvantageCulturel()));
            $x -= 18;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(13);
            $pdf->Cell(17,10,utf8_decode($personnage->getStandardDeVie()),'');
            $x += 84;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getPartOmbre()),'');
            $x -= 84;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(11);
            $pdf->Cell(17,10,utf8_decode('specialités'),'');
            $x += 10;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(7);
            $pdf->Cell(17,10,utf8_decode('particularités'),'');
            $x += 1.5;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(15.5);
            $pdf->Cell(17,10,utf8_decode('+'.$personnage->getAttributAmeliores()->getCorps()),'');
            $x +=45.5;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode('+'.$personnage->getAttributAmeliores()->getCoeur()),'');
            $x +=45.5;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode('+'.$personnage->getAttributAmeliores()->getEsprit()),'');
            $x -= 93;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(6);
            $pdf->Cell(17,10,utf8_decode($personnage->getCorps()),'');
            $x += 45;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getCoeur()),'');
            $x += 46;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(17,10,utf8_decode($personnage->getEsprit()),'');
            $x -= 100;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(18);
            $pdf->Cell(17,10,$admiration,'');
            $x += 45.5;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$inspiration,'');
            $x += 46.7;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$persuasion,'');

            $x -= 92;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(5.5);
            $pdf->Cell(18,10,$athletisme,'');
            $x +=45.5;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$voyage,'');
            $x += 46.7;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$furtive,'');
            
            $x -= 92;
            $pdf->SetLeftMargin($x);
            $pdf->Ln(6);
            $pdf->Cell(18,10,$conscience,'');
            $x +=45.5;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$perspicacite,'');
            $x += 46.7;
            $pdf->SetLeftMargin($x);
            $pdf->Cell(18,10,$fouille,'');
           
           
            

            //créer le pdf
            $pdfFilepath = '../public/fichesPersoVierge/recto1'/*.date('Y-m-d-H-i-s')*/.'.pdf';
            $pdf->Output( $pdfFilepath ,'I');
    }
}
