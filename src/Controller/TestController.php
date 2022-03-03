<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

class TestController extends AbstractController
{
    /**
     * @Route("/front1", name="test")
     */
    public function index(): Response
    {
        return $this->render('back/baseBack.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
