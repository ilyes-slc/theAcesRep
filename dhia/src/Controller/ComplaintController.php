<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reclamation;
use App\Entity\Client;
use App\Entity\Reparation;
use App\Form\RecFormType;
use App\Repository\ReclamationRepository;

class ComplaintController extends AbstractController
{
    /**
     * @Route("/complaint", name="complaint")
     */
    public function index(): Response
    {
        return $this->render('complaint/index.html.twig', [
            'controller_name' => 'ComplaintController',
        ]);
    }

    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function add(Request $req): Response
    {
        $Reclamation = new Reclamation();
        $Rep = new Reparation();
        $Client = new Client();
        $Client->setAdresse("mnihlaaa");
        $Client->setAge(22);
        $Client->setImage("dhia");
        $Client->setLogin("aa");
        $Client->setMail("aa");
        $Client->setMdp("aa");
        $Client->setName("dhiaa");
        $Client->setPhone(53140939);
        $Client->setPrenom("amar");
        $Rep->setDelai(new \DateTime('now'));
        $Reclamation->setDate(new \DateTime('now'));
        $Reclamation->setEtat("Pending");
        $formClassroom = $this->createForm(RecFormType::class, $Reclamation);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid())) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Reclamation);
            $manager->persist($Rep);
            $manager->persist($Client);
            $Reclamation->setIdrep($Rep);
            $Reclamation->setIdclient($Client);
            $manager->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('complaint/index.html.twig', [
            'ajouterForm' => $formClassroom->createView(),
        ]);
    }

    /**
     * @Route("/ajouter2", name="ajouter2")
     */
    public function add2(Request $req): Response
    {
        $Reclamation = new Reclamation();
        $Rep = new Reparation();
        $Client = new Client();
        $Client->setAdresse("aa");
        $Client->setAge(22);
        $Client->setImage("aa");
        $Client->setLogin("aa");
        $Client->setMail("aa");
        $Client->setMdp("aa");
        $Client->setName("aaaaaaa");
        $Client->setPhone(53140939);
        $Client->setPrenom("aa");
        $Rep->setDelai(new \DateTime('now'));
        $Reclamation->setDate(new \DateTime('now'));
        $Reclamation->setEtat("Pending");
        $formClassroom = $this->createForm(RecFormType::class, $Reclamation);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid())) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Reclamation);
            $manager->persist($Rep);
            $manager->persist($Client);
            $Reclamation->setIdrep($Rep);
            $Reclamation->setIdclient($Client);
            $manager->flush();
            return $this->redirectToRoute('back');
        }
        return $this->render('complaint/back.html.twig', [
            'ajouterForm' => $formClassroom->createView(),
        ]);
    }


    /**
     * @Route("/afficher", name="afficher")
     */
    public function show(ReclamationRepository $rep): Response
    {
        $Reclamations = $rep->findAllRecs2();
        return $this->render('complaint/test.html.twig', [
            'Reclamations' => $Reclamations,
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer($id, ReclamationRepository $Rep): Response
    {
        $element = $Rep->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($element);
        $manager->flush();
        return $this->redirectToRoute('afficher');
    }

    /**
     * @Route("/supprimer2/{id}", name="supprimer2")
     */
    public function supprimer2($id, ReclamationRepository $Rep): Response
    {
        $element = $Rep->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($element);
        $manager->flush();
        return $this->redirectToRoute('back');
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function update(int $id, Request $request, ReclamationRepository $Rep): Response
    {
        $element = $Rep->find($id);
        $form = $this->createForm(RecFormType::class, $element);
        $form->handleRequest($request);
        if (($form->isSubmitted()) && ($form->isValid())) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('complaint/modifier.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/modifier2/{id}", name="modifier2")
     */
    public function update2(int $id, Request $request, ReclamationRepository $Rep): Response
    {
        $element = $Rep->find($id);
        $form = $this->createForm(RecFormType::class, $element);
        $form->handleRequest($request);
        if (($form->isSubmitted()) && ($form->isValid())) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();
            return $this->redirectToRoute('back');
        }
        return $this->render('complaint/back.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/traiter/{idRec}",name="traiter")
     */
    public function traiter(int $idRec, ReclamationRepository $Rep)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $element = $Rep->find($idRec);

        if (!$element) {
            throw $this->createNotFoundException(
                'No reclamation found for id ' . $idRec
            );
        }

        $element->setEtat("Treated");
        $entityManager->flush();

        return $this->redirectToRoute('back');
    }
}
