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

    /**
     * @Route("/KARMA", name="KARMA")
     */
    public function showdetail()
    {
        $Article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('back/tableau.html.twig', [
            'article' => $Article]);


    }

    /**
     * @Route("/ajouterkarma", name="karma")
     */
    public function addkarma(Request $req): Response
    {
        $Article = new Article();
        $form = $this->createForm(ArticleType::class, $Article);
        $form->handleRequest($req);

        if (($form->isSubmitted()) && ($form->isValid())) {
            $entite = $this->getDoctrine()->getManager();
            $entite->persist($Article);
            $entite->flush();
            return $this->redirectToRoute('KARMA');
        }
        return $this->render('detailjeux/afficher5.html.twig', [
            'article' => $form->createView()

        ]);
    }

    /**
     * @Route("/supprimerkarma/{id}", name="supprimerkarma")
     */
    public function supprimerkarma($id)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Article);
        $a->flush();
        return $this->redirectToRoute('KARMA');
    }

    /**
     * @Route ("/modifierkarma/{id}", name="modifierkarma")
     */
    public function modifierkarma($id,Request $req)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$Article);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('KARMA');
        }
        return $this->render('detailjeux/afficher5.html.twig', [
            'article'=>$form->createView()

        ]);
    }















}
