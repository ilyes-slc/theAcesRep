<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class BackController extends AbstractController
{
    /**
     * @Route("/back", name="back")
     */
    public function index(): Response
    {
        return $this->render('back/baseBack.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }


    /**
     * @Route("/jouer", name="jouer")
     */
    public function games()
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('back/tableau.html.twig',[
            'article'=> $Article]);


    }

    /**
     * @Route("/ajouterjeux", name="jeux")
     */
    public function addjeux(Request $req ): Response
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
            return $this->redirectToRoute('jouer');
        }
        return $this->render('back/afficherform.html.twig', [
            'article'=>$form->createView()

        ]);
    }
    /**
     * @Route("/supprimertournoi/{id}", name="supprimerjeux")
     */
    public function supprimerjeux($id)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Article);
        $a->flush();
        return $this->redirectToRoute('jouer');
    }

    /**
     * @Route ("/modifierjeux/{id}", name="modifierjeux")
     */
    public function modifierjeux($id,Request $req)
    {
        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$Article);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('jouer');
        }
        return $this->render('back/afficherform.html.twig', [
            'article'=>$form->createView()

        ]);
    }






}

