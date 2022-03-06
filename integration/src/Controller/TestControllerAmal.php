<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

class TestControllerAmal extends AbstractController
{
    /**
     * @Route("/testamal", name="testamal")
     */
    public function index(): Response
    {
        return $this->render('amal/baseFront.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }





}
