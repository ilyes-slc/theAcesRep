<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailjeuxController extends AbstractController
{
    /**
     * @Route("/detailjeux", name="detailjeux")
     */
    public function index(): Response
    {
        return $this->render('detailjeux/index.html.twig', [
            'controller_name' => 'DetailjeuxController',
        ]);

    }














}
