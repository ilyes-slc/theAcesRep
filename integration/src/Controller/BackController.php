<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;



class BackController extends AbstractController
{
    /**
     * @Route("/comment/back", name="back_aycha")
     */
    public function index(): Response
    {
        return $this->render('aycha/back/baseBack.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }



    /**
     * @Route("/comment/jouer", name="jouer")
     */
    public function games()
    {
        $Articlegames=$this->getDoctrine()->getRepository(Article::class)->findarticlebytitle();
      /*  $Article=$this->getDoctrine()->getRepository(Article::class)->findAll();*/
        return $this->render('aycha/back/tableau.html.twig',[
            'articlegames'=> $Articlegames]);


    }

    /**
     * @Route("/comment/ajouterjeux", name="jeux")
     */
    public function addjeux(Request $req,MailerInterface $mailer  ): Response
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
                ->text('Dear Customer, A game article has been added!! '.PHP_EOL.PHP_EOL.'' .$form->get('titre')->getData()  .PHP_EOL.PHP_EOL.'' .$form->get('contenu')->getData())
                ->embed(fopen('C:/Users/MSI/Desktop/integration/public/aycha/uploads/images/'.$originalFilename.'.png', 'r'), 'logo.png');

            $mailer->send($mail);
            return $this->redirectToRoute('jouer');

        }
        return $this->render('aycha/back/afficherform.html.twig', [
            'article'=>$form->createView()

        ]);
    }


    /**
     * @Route("/search", name="search")
     */
   /* public function Search(string $texte ): Response
    {
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class)
            ->add('search', SubmitType::class, [
                'attr' => [
                    'class' => 'fa fa-search'
                ]
            ])
            ->getForm();
        return $this->render('blog/blog3.html.twig', [
            'controller_name' => 'SearchController',
            'form' => $form->createView(),
        ]);
    }*/


    /**
     * @Route("/api", name="api", methods={"GET"})
     */
    public function api(ArticleRepository $repoGr ,SerializerInterface $serializer ):Response
    {
        $resultas= $repoGr->findAll();
        /* $n = $normalizer->normalize($result, null, ['groups' => 'post:read']);
       $json = json_encode($n); */
        $json =$serializer->serialize($resultas,'json',['groups'=> "post:read"]);
        return new JsonResponse($json,200,[],true) ;

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
            $uploadedFile = $form['photoFile']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );
            $Article->setImagearticle($newFilename);

            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('jouer');
        }
        return $this->render('aycha/back/afficherform.html.twig', [
            'article'=>$form->createView()

        ]);
    }






}

