<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Tournoi;

use App\Form\TournoiType;
use App\Repository\ClientRepository;
use App\Repository\TournoiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Sluggable\Util\Urlizer;


/**
 * @Route("/tournoi")
 */
class TournoiController extends AbstractController
{


    /**
     * @Route("/", name="tournoi_index", methods={"GET"})
     */
    public function index(TournoiRepository $tournoiRepository): Response
    {
        return $this->render('amal/tournoi/index.html.twig', [
            'tournois' => $tournoiRepository->findAll(),
        ]);
    }
        /**
     * @Route("/top", name="tournoi_top", methods={"GET"})
     */
    public function topfive(TournoiRepository $tournoiRepository): Response
    {


        $em = $this->getDoctrine()->getManager();
        $torunoipart = $tournoiRepository->getTopParticipantsTournoi();

        $nbparticipant = 0;
        //count
        $i = 0;

        //tableau
        $j = 0;

        foreach ($torunoipart as $pe) {
            $nbparticipant = $nbparticipant + $pe["nbparticipant"];
            $i++;


            $nbparticipantMoyenne = $nbparticipant / $i;

            $nbparticipantMoyenne = round($nbparticipantMoyenne);

            $tour = $em->getRepository(Tournoi::class)->findOneBy(array('id' => $pe['id']));

            $nbparticipantTop[$j] = $tour;

            $j++;
        }
        return $this->render('amal/tournoi/top.html.twig',
            array('id' => $pe['id'], 'nbparticipant' => $pe['nbparticipant'], 'topfive' => $nbparticipantTop));
    }


    /**
     * @Route("/list", name="tournoi_list", methods={"GET"})
     */
    public function listt(TournoiRepository $tournoiRepository): Response
    {
        return $this->render('amal/tournoi/list.html.twig', [
            'tournois' => $tournoiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/participer/{id}", name="tournoi_participer", methods={"GET"})
     */
    public function participer(TournoiRepository $tournoiRepository,
                                                 $id, EntityManagerInterface $entityManager): Response
    {
        $tournoi = $tournoiRepository->findOneById($id);
        $nbparticipant = $tournoi->getNbparticipant();
        $tournoi->setNbparticipant($nbparticipant +1);
        $tournoi->setUser($this->getDoctrine()->getManager()->getRepository(Client::class)->find(1));


        $entityManager->persist($tournoi);
        $entityManager->flush();


        //USER CONNECTEE :
        //$user = $this->getUser()->getUsername() : en cours
        $user = $tournoi->getUser()->getName();


        return $this->render('amal/tournoi/success_participation.html.twig', [
            'tournois' => $tournoiRepository->findAll(), 'user' => $user
        ]);
    }


    /**
     * @Route("/new", name="tournoi_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tournoi = new Tournoi();
        $form = $this->createForm(TournoiType::class, $tournoi);
        $form->handleRequest($request);



        // this condition is needed because the 'brochure' field is not required
        // so the PDF file must be processed only when a file is uploaded
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['photoFile']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/amal/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );

            $tournoi->setImage($originalFilename);
            $entityManager->persist($tournoi);
            $entityManager->flush();
            // updates the 'brochureFilename' property to store the PDF file name
            // instead of its contents

            return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);

        }


        return $this->render('amal/tournoi/new.html.twig', [
            'tournoi' => $tournoi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_show", methods={"GET"})
     */
    public function show(Tournoi $tournoi): Response
    {
        return $this->render('amal/tournoi/show.html.twig', [
            'tournoi' => $tournoi,
        ]);
    }

    /**
     * @Route("/{id}/sponsors", name="tournoi_sponsors", methods={"GET"})
     */
    public function getSponsors(Tournoi $tournoi): Response
    {
        return $this->render('amal/tournoi/sponsors.html.twig', [
            'sponsors' => $tournoi->getSponsors(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tournoi_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tournoi $tournoi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TournoiType::class, $tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('amal/tournoi/edit.html.twig', [
            'tournoi' => $tournoi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_delete", methods={"POST"})
     */
    public function delete(Request $request, Tournoi $tournoi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tournoi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tournoi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);
    }








}



