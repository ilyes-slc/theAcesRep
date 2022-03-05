<?php

namespace App\Controller;
use App\Entity\Livraison;
use App\Repository\LivraisonRepository;
use App\Entity\Livreur;
use App\Form\LivraisonType;
use App\Form\Livraison1Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArtoxLab\Bundle\SmsBundle\Service\ProviderManager;


use Dompdf\Dompdf;
use Dompdf\Options;



use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;

class LivraisonController extends AbstractController
{
     /**
     * @Route("/afficherL", name="afficherL")
     */
    public function index(): Response
    {
        return $this->render('livraison/livraison.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);
    }
    /**
     * @Route("/front", name="front")
     */
    public function indexF(): Response
    {
        return $this->render('baseFront.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

     /**
     * @Route("/afficherL", name="afficherL")
     */
    public function afficher(Request $request,PaginatorInterface $paginator)
    {
        $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->findAll();
        $Livraison = $paginator->paginate(
            $Livraison, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );
        return $this->render('back/livraison.html.twig',['livraison'=>$Livraison]);


    }
      /**
     * @Route("/ajouterL/{cin}", name="ajouterL")
     */
    public function ajouter($cin,Request $req): Response
    {   $Livraison=new Livraison();
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
        $form=$this->createForm(LivraisonType::class,$Livraison);
        $form->handleRequest($req);
     if($form->isSubmitted() && $form->isValid())
     {  
         $entite=$this->getDoctrine()->getManager();
         $Livraison->setEtat("en cours");
         $Livraison->setCinlivreur($Livreur);

     $entite->persist($Livraison);
     $entite->flush();
     $client = SMSClient::getInstance('2Yf3CBy0mWhiS0TcVCWonAOkEUXs6cLF', 'Bgflgfsi6lEN1e2V');
     $sms = new SMS($client);
     $sms->message('une livraison a été ajoutée
     Prenom du Livreur: '.$Livreur->getPrenom().'
     Nom du livreur: '.$Livreur->getName().'
     ID Produit: '. $Livraison->getIdprod().'
     Adresse client:'. $Livraison->getAdresseclient())
      ->from('+21627300520')
      ->to($Livreur->getTel())
      ->send();
     return $this->redirectToRoute('front');
     }
     return $this->render('livraison/detail.html.twig',['livraisonForm'=>$form->createView(),'l'=>$Livreur]);

    }

    
    /**
     * @Route("/supprimerL/{id}", name="supprimerL")
     */
    public function supprimer($id)
    {
        $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Livraison);
        $a->flush();
        return $this->redirectToRoute('afficherL');
    }
    /**
     * @Route ("/modifierL/{id}", name="modifierL")
     */
    public function modifier($id,Request $req)
    {
        $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $form=$this->createForm(Livraison1Type::class,$Livraison);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
           $a=$this->getDoctrine()->getManager();
           $a->flush();
           return $this->redirectToRoute('afficherL');
        }
        return $this->render('livraison/modifier.html.twig',['livraison1Form'=>$form->createView()]);
    
    
    
    
    
    
    }
     /**
     * @Route("/afficherLF", name="afficherLF")
     */
    public function afficherF()
    {
        $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->findAll();
        return $this->render('test/afficherFront.html.twig',['livraison'=>$Livraison]);


    }
    
     /**
     * @Route("/mapsF/{cin}", name="mapsF")
     */
    public function maps($cin)
    { $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
        return $this->render('livraison/map.html.twig',['l'=> $Livreur]);
    }

    /**
     * @Route("/mapsB", name="mapsB")
     */
    public function mapsB()
    {
       
        return $this->render('back/mapBack.html.twig');
    }

 /**
     * @Route("/pdf", name="pdf")
     */
    public function list(LivraisonRepository $LivraisonRepository, Request $request): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $Livraison=$LivraisonRepository->findAll();
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('livraison/pdf.html.twig', [
            'livraison' => $Livraison,
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A3', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Livraisons.pdf", [
            "Attachment" => false
        ]);

    
        
    }

    
}


