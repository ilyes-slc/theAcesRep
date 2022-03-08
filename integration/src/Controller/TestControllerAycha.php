<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

class TestControllerAycha extends AbstractController
{
    /**
     * @Route("/testaycha", name="testaycha")
     */
    public function index(): Response
    {
        return $this->render('aycha/test/baseFront.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
