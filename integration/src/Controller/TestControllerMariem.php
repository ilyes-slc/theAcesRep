<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

class TestControllerMariem extends AbstractController
{
    /**
     * @Route("/Back", name="Back")
     */
    public function indexBack(): Response
    {
        return $this->render('mariem/baseBack.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    /**
     * @Route("/Front", name="Front")
     */
    public function indexFront(): Response
    {
        return $this->render('mariem/baseFront.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
