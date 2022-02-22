<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\ClassroomRepository;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

class BlogController extends AbstractController
{
    /**
     * @Route("/voir", name="blog")
     */
    public function afficher(): Response
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/blogtournoi.html.twig', [
            'affichertournoi' => $Article,
        ]);
    }

    /**
     * @Route("/aycha", name="games")
     */
    public function affichergames(): Response
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/blog3.html.twig', [
            'affichergame' => $Article,
        ]);
    }

    /**
     * @Route("/produit", name="produit")
     */
    public function afficherproduit(): Response
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/blogproduit.html.twig', [
            'afficherproduct' => $Article,
        ]);
    }

    /**
     * @Route("/livreur", name="livreur")
     */
    public function afficherlivreur(): Response
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/livrer.html.twig', [
            'afficherlivreur' => $Article,
        ]);
    }
    /**
     * @Route("/DETAIL", name="DETAIL")
     */
    public function afficherx(): Response
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('blog/detailencore.html.twig', [
            'afficherx' => $Article,
        ]);
    }





}
