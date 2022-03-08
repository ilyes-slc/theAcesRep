<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Client;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\ArticleRepository;
use App\Repository\ClassroomRepository;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{



    /**
     * @Route("/new1/{id}", name="comment_index", methods={"GET","POST"})
     */
    public function comment_index(Request $request , int $id ,CommentaireRepository $commentaireRepository): Response

    {

        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $list_comm = $this->getDoctrine()->getRepository(Commentaire::class)->findBy(
            ['article' => $id]
        );
        $commentaire = new Commentaire();
        $commentaire->setArticle($Article);
        $Client = new Client();

        $Client->setAdresse("aab");
        $Client->setAge(22);
        $Client->setImage("aab");
        $Client->setLogin("aab");
        $Client->setMail("aab");
        $Client->setMdp("aab");
        $Client->setName("aab");
        $Client->setPhone(53140939);
        $Client->setPrenom("aab");
        $commentaire->setClient($Client);

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($Client);
            $entityManager->persist($commentaire);
            $entityManager->persist($Article);

            $entityManager->flush();


            return $this->redirectToRoute('comment_index', array('id'=>$id), Response::HTTP_SEE_OTHER);
        }

        return $this->render('aycha/blog/detailencore.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'afficherx' => $Article,
            'commentaires' => $commentaireRepository->findAll(),
            'ListC' => $list_comm,
        ]);
    }




  /*  public function new(Request $request): Response

    {

        $Article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commentaire);
            $entityManager->flush();

            return $this->redirectToRoute('comment_index', array('id' => $commentaire->getId()), Response::HTTP_SEE_OTHER);
        }

        return $this->render('blog/detailencore.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'afficherx' => $Article,
        ]);
    }*/




    /**
     * @Route("/new1/{id}", name="comment_new1", methods={"GET","POST"})
     */

    public function new1(Request $request , int $id ,CommentaireRepository $commentaireRepository): Response

    {

        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id); //chercher article par id
        $list_comm = $this->getDoctrine()->getRepository(Commentaire::class)->findBy(
            ['article' => $id]
        );
        $commentaire = new Commentaire();
        $commentaire->setArticle($Article);
        $Client = new Client();

        $Client->setAdresse("aa");
        $Client->setAge(22);
        $Client->setImageClient("aa");
        $Client->setLogin("aa");
        $Client->setMail("aa");
        $Client->setMdp("aa");
        $Client->setName("aa");
        $Client->setNumeroTel(53140939);
        $Client->setPrenom("aa");
        $commentaire->setClient($Client);

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Client);
            $entityManager->persist($commentaire);
            $entityManager->persist($Article);



            $entityManager->flush();


            return $this->redirectToRoute('comment_index', array('id'=>$id), Response::HTTP_SEE_OTHER);
        }



        return $this->render('aycha/blog/detailencore.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'afficherx' => $Article,
            'commentaires' => $commentaireRepository->findAll(),
            'ListC' => $list_comm,
        ]);
    }

    /**
     * @Route("/{id}", name="comment_show", methods={"GET"})
     */
    public function show(Commentaire $commentaire): Response
    {
        return $this->render('aycha/comment/show.html.twig', [
            'commentaire' => $commentaire,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="comment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commentaire $commentaire): Response
    {
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comment_index', array('id'=>$commentaire->getArticle()->getId()), Response::HTTP_SEE_OTHER);
        } //array pour fonction paramétrée

        return $this->render('aycha/blog/testautre.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),

        ]);


    }

    /**
     * @Route("/supprimercomm4/{id}", name="supprimercomm4")
     */
    public function supprimercomm4($id)
    {
        $comm=$this->getDoctrine()->getRepository(Commentaire::class)->find($id);
        $Art=$comm->getArticle()->getId();
        $a=$this->getDoctrine()->getManager();
        $a->remove($comm);
        $a->flush();
        return $this->redirectToRoute('comment_index', array('id'=>$Art));
    }














}
