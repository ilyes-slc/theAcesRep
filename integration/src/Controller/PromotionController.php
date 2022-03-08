<?php

namespace App\Controller;


use App\Entity\Element;
use App\Entity\Promotion;
use App\Entity\User;
use App\Form\PromotionFormType;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    /**
     * @Route("/promotion", name="promotion")
     */
    public function index(): Response
    {
        return $this->render('mariem/promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
        ]);
    }
    /**
     * @Route("/ajouter", name="ajouter",methods={"GET","POST"}))
     */

    public function Ajouter(Request $req,\Swift_Mailer $mailer): Response
    {
        $time = date('Y-m-d H:i:s', (time()));

        $Promotion = new Promotion();

        $Promotion->setDateDebut(\DateTime::createFromFormat('Y-m-d H:i:s', $time));

        $formClassroom = $this->createForm(PromotionFormType::class, $Promotion);
        $formClassroom->handleRequest($req);

        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid()))
        {
            // $test=$Promotion->getIdprod();
            //$aa=$this->getDoctrine()->getRepository(Element::class)->findOneBy(['nom'=>"testt1"]);
            // $vv= $formClassroom->get
            $vv=$Promotion->getElements();
            foreach ($vv as $mm){
                $mm->setPromotion($Promotion);
                $manager2 = $this->getDoctrine()->getManager();
                $manager2->persist($mm);
                $manager2->flush();
            }
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Promotion);
            $p=$Promotion->getPourcentage();
            $manager->flush();
            $users=$this->getDoctrine()->getRepository(User::class)->findAll();

            foreach ($users as $user){
                $message = (new \Swift_Message('THE ACES'))
                    ->setFrom('mariem.karoui@esprit.tn')
                    ->setContentType("text/html")
                    ->setTo($user->getMail())
                    ->setBody("<p style='color: black;'> Nouvelle promotion. a :  </p> <strong style='color:red;'> $p </strong> ");
                $mailer->send($message) ;
            }
            return $this->redirectToRoute('afficherPromotion');
        }
        return $this->render('mariem/promotion/AjouterPromotion.twig', ['Promotion' => $formClassroom->createView()]);
    }
    /**
     * @Route("/afficherPromotion", name="afficherPromotion")
     */
    public function AfficherPromotion()
    {
        $repo = $this->getDoctrine()->getRepository(Promotion::class);
        $Promotion = $repo->findAll();

        return $this->render('mariem/promotion/AfficherPromotion.twig', ["Promotion" => $Promotion]);
    }
    /**
     * @Route("/supprimerPromotion/{id}", name="supprimer")
     */
    public function supprimer($id)
    {
        $Promotion=$this->getDoctrine()->getRepository(Promotion::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Promotion);
        $a->flush();
        return $this->redirectToRoute('afficherPromotion');
    }
    /**
     * @Route ("/modifierPromotion/{id}", name="modifierPromotion")
     */
    public function modifier($id,Request $req)
    {
        $Promotion=$this->getDoctrine()->getRepository(Promotion::class)->find($id);
        $form=$this->createForm(PromotionFormType::class,$Promotion);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherPromotion');
        }
        return $this->render('mariem/promotion/AjouterPromotion.twig', [
            'Promotion'=>$form->createView()
        ]);
    }

    /**
     * @Route("/offreElementFront", name="offreElementFront")
     */
    public function AfficherOffreElementFront()
    {
        $repo = $this->getDoctrine()->getRepository(Promotion::class);
        $promotion = $repo->findAll();
        return $this->render('mariem/element/offreElementFront.html.twig', ["promotion" => $promotion]);
    }
}