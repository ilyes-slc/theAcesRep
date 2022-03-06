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

class BacklivreurController extends AbstractController
{
    /**
     * @Route("/backlivreur", name="backlivreur")
     */
    public function index(): Response
    {
        return $this->render('aycha/backlivreur/index.html.twig', [
            'controller_name' => 'BacklivreurController',
        ]);
    }



    /**
     * @Route("/comment/afficherliv", name="live")
     */
    public function showlivreur()
    {
        $Articlelivreur=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle3();
        return $this->render('aycha/back/liv4.html.twig',[
            'articlelivreur'=> $Articlelivreur]);


    }


    /**
     * @Route("/comment/ajouterlivreur", name="livrer")
     */
    public function addlivreur(Request $req,MailerInterface $mailer): Response
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
                ->to('mednabil.kallel@esprit.tn')
                ->subject('New Article added')
                ->text('Dear Customer, A delivery item has been added, visit it, your opinion counts!! '.PHP_EOL.PHP_EOL.'' .$form->get('titre')->getData()  .PHP_EOL.PHP_EOL.'' .$form->get('contenu')->getData())
                ->embed(fopen('C:/Users/MSI/Desktop/integration/public/aycha/uploads/images/'.$originalFilename.'.png', 'r'), 'logo.png');

            $mailer->send($mail);
            return $this->redirectToRoute('live');
        }
        return $this->render('aycha/backlivreur/formlivreur.html.twig', [
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
            return $this->redirectToRoute('live');
        }
        return $this->render('aycha/backlivreur/formlivreur.html.twig', [
            'article'=>$form->createView()

        ]);
    }
}
