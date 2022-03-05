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
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

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
            if ($Reclamation->getTarget() != "Product") {
                $Reclamation->setIdrep(NULL);
                $Reclamation->setMethodRemb("");
            } else {
                $choix = $formClassroom->get('target')->getData();
                $choix2 = $formClassroom->get('method_remb')->getData();
                $Reclamation->setMethodRemb($choix2);
                $Reclamation->setTarget($choix);
                $Reclamation->setIdrep($Rep);
            }
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Reclamation);
            $manager->persist($Rep);
            $manager->persist($Client);
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
        $Client->setAdresse("mnihlaaaaaaaaa");
        $Client->setAge(22);
        $Client->setImage("dhiaaaaaaaaaaaaaaaaaa");
        $Client->setLogin("aaaaaaaaaaaaaa");
        $Client->setMail("aaaaaaaaaaaa");
        $Client->setMdp("aaaaaaaaaaaa");
        $Client->setName("dhiaaaaaaaaaaa");
        $Client->setPhone(53140939);
        $Client->setPrenom("amarrrrrrrrrrr");
        $Rep->setDelai(new \DateTime('now'));
        $Reclamation->setDate(new \DateTime('now'));
        $Reclamation->setEtat("Pending");
        $formClassroom = $this->createForm(RecFormType::class, $Reclamation);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid())) {
            if ($Reclamation->getTarget() != "Product") {
                $Reclamation->setIdrep(NULL);
                $Reclamation->setMethodRemb("");
            } else {
                $choix = $formClassroom->get('target')->getData();
                $choix2 = $formClassroom->get('method_remb')->getData();
                $Reclamation->setMethodRemb($choix2);
                $Reclamation->setTarget($choix);
                $Reclamation->setIdrep($Rep);
            }
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Reclamation);
            $manager->persist($Rep);
            $manager->persist($Client);
            $Reclamation->setIdclient($Client);
            $manager->flush();
            return $this->redirectToRoute('back');
        }
        return $this->render('complaint/back.html.twig', [
            'ajouterForm' => $formClassroom->createView(),
        ]);
    }

    /**
     * @Route("/api1", name="api1", methods={"GET"})
     */
    public function api1(ReclamationRepository $repoGr ,SerializerInterface $serializer ):Response
    {
        $resultas= $repoGr->findAll();
         /* $n = $normalizer->normalize($result, null, ['groups' => 'post:read']);
        $json = json_encode($n); */
        $json =$serializer->serialize($resultas,'json',['groups'=> "post:read"]);
        return new JsonResponse($json,200,[],true) ;
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
        $element->setEtat("Archived");
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
    public function traiter(int $idRec, ReclamationRepository $Rep, MailerInterface $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $element = $Rep->find($idRec);

        $element->setEtat("Treated");
        $entityManager->flush();

        $mail = (new Email())
        ->from('mohameddhia.benamar@esprit.tn')
        ->to('karma.aycha@esprit.tn')
        ->subject('Reclamation Treated')
        ->text('Chere/Cher Client, Votre Reclamation a ete traite');

        $mailer->send($mail);

        return $this->redirectToRoute('back');
    }
}
