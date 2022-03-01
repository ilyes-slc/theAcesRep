<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BacklivreurController extends AbstractController
{
    /**
     * @Route("/backlivreur", name="backlivreur")
     */
    public function index(): Response
    {
        return $this->render('backlivreur/index.html.twig', [
            'controller_name' => 'BacklivreurController',
        ]);
    }



    /**
     * @Route("/afficherliv", name="live")
     */
    public function showlivreur()
    {
        $Articlelivreur=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle3();
        return $this->render('back/liv4.html.twig',[
            'articlelivreur'=> $Articlelivreur]);


    }

    /**
     * @Route("/ajouterlivreur", name="livrer")
     */
    public function addlivreur(Request $req): Response
    {
        $Article = new Article();
        $form = $this->createForm(ArticleType::class, $Article);
        $form->handleRequest($req);

        if (($form->isSubmitted()) && ($form->isValid())) {

            $uploadedFile = $form['photoFile']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );
            $Article->setImagearticle($newFilename);










            $entite = $this->getDoctrine()->getManager();
            $entite->persist($Article);
            $entite->flush();
            return $this->redirectToRoute('live');
        }
        return $this->render('backlivreur/formlivreur.html.twig', [
            'article'=>$form->createView()

        ]);
    }



    /**
     * @Route("/supprimerlivreur/{id}", name="supprimerlivreur")
     */
    public function supprimerlivreur($id)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Article);
        $a->flush();
        return $this->redirectToRoute('live');
    }

    /**
     * @Route ("/modifierlivreur/{id}", name="modifierlivreur")
     */
    public function modifierlivreur($id,Request $req)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$Article);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {

            $uploadedFile = $form['photoFile']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );
            $Article->setImagearticle($newFilename);

            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('live');
        }
        return $this->render('backlivreur/formlivreur.html.twig', [
            'article'=>$form->createView()

        ]);
    }
}
