<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Client;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }







    /**
     * @Route("/new1/{id}", name="afficherback", methods={"GET","POST"})
     */
    public function afficherback(Request $request , int $id ,CommentaireRepository $commentaireRepository): Response

    {

        $Article=$this->getDoctrine()->getRepository(Article::class)->find($id);
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



        return $this->render('blog/detailencore.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),

            'commentaires' => $commentaireRepository->findAll(),
            'ListC' => $list_comm,
            'affichergame' => $Article,
        ]);
    }





















}
