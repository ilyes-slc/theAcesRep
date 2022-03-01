<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Gedmo\Sluggable\Util\Urlizer;
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

        $Articletournoi=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle1();
        return $this->render('back/tournoi7.html.twig',[
            'articletournoi'=> $Articletournoi]);


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
            return $this->redirectToRoute('showtournoi');
        }
        return $this->render('backtournoi/afficherform2.html.twig', [
            'article'=>$form->createView()

        ]);
    }







}
