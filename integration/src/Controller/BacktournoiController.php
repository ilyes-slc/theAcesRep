<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class BacktournoiController extends AbstractController
{

    /**
     * @Route("/comment/tournoi", name="showtournoi")
     */
    public function showtournoi()
    {

        $Articletournoi=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle1();
        return $this->render('aycha/back/tournoi7.html.twig',[
            'articletournoi'=> $Articletournoi]);


    }

    /**
     * @Route("/comment/ajoutertournoi", name="Article")
     */
    public function addtournoi(Request $req ,MailerInterface $mailer ): Response
    {
        $Article = new Article();
        $form = $this->createForm(ArticleType::class, $Article);
        $form->handleRequest($req);

        if (($form->isSubmitted()) && ($form->isValid())) {


            $uploadedFile = $form['photoFile']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/aycha/uploads/images';
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

            $mail = (new Email())
                ->from('karma.aycha@esprit.tn')
                ->to('amal.souissi@esprit.tn')
                ->subject('New Article added')
                ->text('Dear Customer, A tournament article has been added, visit it!! '.PHP_EOL.PHP_EOL.'' .$form->get('titre')->getData()  .PHP_EOL.PHP_EOL.'' .$form->get('contenu')->getData())
                ->embed(fopen('C:/Users/MSI/Desktop/integration/public/aycha/uploads/images/'.$originalFilename.'.png', 'r'), 'logo.png');

            $mailer->send($mail);
            return $this->redirectToRoute('showtournoi');
        }
        return $this->render('aycha/backtournoi/afficherform2.html.twig', [
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
            $pathupload = $this->getParameter('kernel.project_dir').'/public/aycha/uploads/images';
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
        return $this->render('aycha/backtournoi/afficherform2.html.twig', [
            'article'=>$form->createView()

        ]);
    }







}
