<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;
use App\Repository\ReclamationRepository;

class TestController extends AbstractController
{
    /**
     * @Route("/testaa", name="testaa")
     */
    public function index(): Response
    {
        return $this->render('baseFront.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/back", name="back")
     */
    public function back(ReclamationRepository $rep): Response
    {
        $Reclamations = $rep->findAllRecs2();

        

        
        return $this->render('baseBack.html.twig', [
            'Reclamations' => $Reclamations,
        ]);
    }
}
