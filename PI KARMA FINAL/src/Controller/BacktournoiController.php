<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BacktournoiController extends AbstractController
{

    /**
     * @Route("/tournoi", name="showtournoi")
     */
    public function showtournoi()
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('back/tableau.html.twig',[
            'article'=> $Article]);


    }

    /**
     * @Route("/ajoutertournoi", name="Article")
     */
    public function addtournoi(Request $req): Response
    {
        $Article = new Article();
        $form = $this->createForm(ArticleType::class, $Article);
        $form->handleRequest($req);

        if (($form->isSubmitted()) && ($form->isValid())) {
            $entite = $this->getDoctrine()->getManager();
            $entite->persist($Article);
            $entite->flush();
            return $this->redirectToRoute('showtournoi');
        }
        return $this->render('backtournoi/afficherform2.html.twig', [
            'article'=>$form->createView()

        ]);
    }


    /**
     * @Route("/supprimertournoi/{id}", name="supprimertournoi")
     */
    public function supprimertournoi($id)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Article);
        $a->flush();
        return $this->redirectToRoute('showtournoi');
    }

    /**
     * @Route ("/modifiertournoi/{id}", name="modifiertournoi")
     */
    public function modifiertournoi($id,Request $req)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$Article);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('showtournoi');
        }
        return $this->render('backtournoi/afficherform2.html.twig', [
            'article'=>$form->createView()

        ]);
    }







}
