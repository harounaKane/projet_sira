<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/voiture')]
class VoitureController extends AbstractController
{
    #[Route('/', name: 'app_voiture_index')]
    public function index(VoitureRepository $repo): Response
    {
        return $this->render('voiture/index.html.twig', [
            'voitures' => $repo->findAll(),
            
        ]);
    }

    #[Route('/new', name: 'app_voiture_new')]
    public function new(Request $request, VoitureRepository $repo){
        $voiture = new Voiture;
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){

            $image = $form->get('photo')->getData();
            $file_name = $voiture->getTitre() .'_'. md5(uniqid()).'.'. $image->guessExtension();
            $image->move(
                $this->getParameter("voiture_directory"), 
                $file_name
            );

            $voiture->setPhoto($file_name);
            $repo->save($voiture, true);

            return $this->redirectToRoute('app_voiture_index');
        }

        return $this->renderForm('voiture/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form
        ]);
    }

    #[Route('/{id}/show', name: 'app_voiture_show')]
    public function show(Voiture $voiture){
        return $this->render('voiture/show.html.twig', [
            "voiture" => $voiture
        ]);
    }

    #[Route('/{id}/edit', name: 'app_voiture_edit')]
    public function edit(Voiture $voiture, Request $request, VoitureRepository $repo){
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            //SI PAS NEW IMG, ON GARDE L'IMAGE EN BD
            if( $voiture->getPhoto() == 'update' ) {
                dump($voiture);
                dump($repo->find($voiture->getId() ));
                $voiture->setPhoto( $repo->find($voiture->getId() )->getPhoto() );
                dd($voiture);
            }
            $repo->save($voiture, true);
        }

        return $this->renderform('voiture/edit.html.twig', [
            "voiture" => $voiture,
            "form" => $form
        ]);
    }
}
