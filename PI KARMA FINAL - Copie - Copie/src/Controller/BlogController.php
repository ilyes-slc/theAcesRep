<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Form\SearcharticleType;
use App\Repository\ArticleRepository;
use App\Repository\ClassroomRepository;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BlogController extends AbstractController
{
    /**
     * @Route("/comment/voir", name="blog")
     */
    public function afficher(): Response
    {
        $Articletournoi=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle1();
        return $this->render('blog/blogtournoi.html.twig', [
            'articletournoi' => $Articletournoi,
        ]);
    }

    /**
     * @Route("/comment/aycha", name="games")
     */
    public function affichergames(Request $request , ArticleRepository $ArticleRepository): Response
    {


        $form = $this->createForm(SearcharticleType::class);

        $search = $form->handleRequest($request);


            // On recherche les articles correspondant aux mots clés
            $Article= $ArticleRepository->search(
                $search->get('titre')->getData()

            );




        $Articlegames=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle();
        return $this->render('blog/blog3.html.twig', [
            'articlegames' => $Articlegames,
            'form' => $form->createView(),
            'Article' => $Article,
        ]);





    }


    /**
     * @Route("/comment/aycha1", name="games1")
     */
    public function affichersearch(Request $request , ArticleRepository $ArticleRepository): Response
    {

        $form = $this->createForm(SearcharticleType::class);

        $search = $form->handleRequest($request);


        // On recherche les articles correspondant aux mots clés

        $Article= $ArticleRepository->search(
            $search->get('titre')->getData()

        );


        return $this->render('blog/blog8.html.twig', [

            'form' => $form->createView(),
            'Article' => $Article,
        ]);



    }























    /**
     * @Route("/comment/produit", name="produit")
     */
    public function afficherproduit(): Response
    {
        $Articleproduct=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle2();
        return $this->render('blog/blogproduit.html.twig', [
            'articleproduct' =>  $Articleproduct,
        ]);
    }














    /**
     * @Route("/comment/livreur", name="livreur")
     */
    public function afficherlivreur(): Response
    {
        $Articlelivreur=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle3();
        return $this->render('blog/livrer.html.twig', [
            'articlelivreur' => $Articlelivreur,
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

    /**
     * @Route("/comment/comm", name="comment")
     */
    public function affichercom(): Response
    {
        $comm=$this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('blog/comment4.html.twig', [
            'affichercomm' => $comm,
        ]);
    }

    /**
     * @Route("/supprimercomm/{id}", name="supprimercomm")
     */
    public function supprimercomm($id)
    {
        $comm=$this->getDoctrine()->getRepository(Commentaire::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($comm);
        $a->flush();
        return $this->redirectToRoute('comment');
    }






}
