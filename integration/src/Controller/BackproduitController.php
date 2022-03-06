<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class BackproduitController extends AbstractController
{
    /**
     * @Route("/backproduit", name="backproduit")
     */
    public function index(): Response
    {
        return $this->render('aycha/backproduit/index.html.twig', [
            'controller_name' => 'BackproduitController',
        ]);
    }
    /**
     * @Route("/comment/afficherproduct", name="product")
     */
    public function showproduct()
    {
        $Articleproduct=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle2();
        return $this->render('aycha/back/product4.html.twig',[
            'articleproduct'=> $Articleproduct]);


    }





    /**
     * @Route("/comment/ajouterproduct", name="produit1")
     */
    public function addproduct(Request $req,MailerInterface $mailer): Response
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
                ->to('mohameddhia.benamar@esprit.tn')
                ->subject('New Article added')
                ->text('Dear Customer, a Product Item has been added, please let us know what you think! '.PHP_EOL.PHP_EOL.'' .$form->get('titre')->getData()  .PHP_EOL.PHP_EOL.'' .$form->get('contenu')->getData())
                ->embed(fopen('C:/Users/MSI/Desktop/integration/public/aycha/uploads/images/'.$originalFilename.'.png', 'r'), 'logo.png');

            $mailer->send($mail);
            return $this->redirectToRoute('product');
        }
        return $this->render('aycha/backproduit/formproduit.html.twig', [
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
            return $this->redirectToRoute('product');
        }
        return $this->render('aycha/backproduit/formproduit.html.twig', [
            'article'=>$form->createView()

        ]);
    }




}
