<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackproduitController extends AbstractController
{
    /**
     * @Route("/backproduit", name="backproduit")
     */
    public function index(): Response
    {
        return $this->render('backproduit/index.html.twig', [
            'controller_name' => 'BackproduitController',
        ]);
    }
    /**
     * @Route("/afficherproduct", name="product")
     */
    public function showproduct()
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('back/tableau.html.twig',[
            'article'=> $Article]);


    }

    /**
     * @Route("/ajouterproduct", name="produit1")
     */
    public function addproduct(Request $req): Response
    {
        $Article = new Article();
        $form = $this->createForm(ArticleType::class, $Article);
        $form->handleRequest($req);

        if (($form->isSubmitted()) && ($form->isValid())) {
            $entite = $this->getDoctrine()->getManager();
            $entite->persist($Article);
            $entite->flush();
            return $this->redirectToRoute('product');
        }
        return $this->render('backproduit/formproduit.html.twig', [
            'article'=>$form->createView()

        ]);
    }

    /**
     * @Route("/supprimerproduct/{id}", name="supprimerproduct")
     */
    public function supprimerproduct($id)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Article);
        $a->flush();
        return $this->redirectToRoute('product');
    }

    /**
     * @Route ("/modifierproduct/{id}", name="modifierproduct")
     */
    public function modifierproduct($id,Request $req)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$Article);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('product');
        }
        return $this->render('backproduit/formproduit.html.twig', [
            'article'=>$form->createView()

        ]);
    }




}
