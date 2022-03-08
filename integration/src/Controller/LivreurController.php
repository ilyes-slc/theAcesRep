<?php

namespace App\Controller;
use App\Entity\Livreur;
use App\Entity\Livraison;
use App\Repository\LivreurRepository;
use App\Entity\Urlizer;
use App\Form\LivreurType;
use App\Form\Livreur1Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LivreurController extends AbstractController
{
    /**
     * @Route("/afficher", name="afficher")
     */
    public function index(): Response
    {
        return $this->render('nabil/back/Livreur.html.twig', [
            'controller_name' => 'LivreurController',
        ]);
    }

    /**
     * @Route("/json", name="json_index", methods={"GET"})
     */
    public function jsonindex(LivreurRepository $LivreurRepository , SerializerInterface $serializer): Response
    {
        $result = $LivreurRepository->findAll();
        /* $n = $normalizer->normalize($result, null, ['groups' => 'pack:read']);
        $json = json_encode($n); */
        $json = $serializer->serialize($result, 'json', ['groups' => 'livreur:read']);
        return new JsonResponse($json, 200, [], true);
    }

     /**
     * @Route("/nabil/{cin}", name="nabil")
     */
  public function detail($cin)
  {
      $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
      return $this->render('nabil/livraison/detail.html.twig',['livreur'=>$Livreur]);

  }

 /**
     * @Route("/list/{cin}", name="list")
     */
    public function listItem($cin): Response
    {
        $form = $this->getDoctrine()
            ->getRepository(Livreur::class)
            ->find($cin);


       


        return $this->render('nabil/livraison/list.html.twig', [
            'l' => $form,
            
        ]);
    }

     /**
     * @Route("/afficher", name="afficher")
     */
    public function afficher(Request $request,PaginatorInterface $paginator )
    {
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->findAll();
        $Livreur = $paginator->paginate(
            $Livreur, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            1 /*limit per page*/
        );
        
       


        return $this->render('nabil/back/livreur.html.twig',
        ['livreur'=>$Livreur]);


    }

    /**
     * @Route("/afficherLF", name="afficherLF")
     */
    public function afficherF(Request $request,PaginatorInterface $paginator)
    {
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->findAll();
        $Livreur = $paginator->paginate(
            $Livreur, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            1 /*limit per page*/
        );

        return $this->render('nabil/livraison/AjouterLivraison.html.twig',['livreur'=>$Livreur]);


    }
      /**
     * @Route("/ajouterli", name="ajouterli")
     */
    public function ajouter(Request $req): Response
    {   $Livreur=new Livreur();
        $form=$this->createForm(LivreurType::class,$Livreur);
        $form->handleRequest($req);
     if($form->isSubmitted() && $form->isValid())
     {  
         /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['image']->getData();
        $destination = $this->getParameter('kernel.project_dir').'/public/nabil/uploads';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFilename
        );
            $Livreur->setImage($newFilename);
         $entite=$this->getDoctrine()->getManager();
     $Livreur->setRating(0);   
     $entite->persist($Livreur);
     $entite->flush();
     return $this->redirectToRoute('afficher');
     
    }
     return $this->render('nabil/livreur/AjouterLivreur.html.twig',['livreurForm'=>$form->createView()]);

    }
    /**
     * @Route("/supprimer/{cin}", name="supprimeraaaa")
     */
    public function supprimer($cin)
    {
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Livreur);
        $a->flush();
        return $this->redirectToRoute('afficher');
    }
    /**
     * @Route ("/modifier/{cin}", name="modifier")
     */
    public function modifier($cin,Request $req)
    {
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
        $form=$this->createForm(Livreur1Type::class,$Livreur);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
             /** @var UploadedFile $uploadedFile */
             $uploadedFile = $form['image']->getData();
             $destination = $this->getParameter('kernel.project_dir').'/public/nabil/uploads';
             $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
             $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
             $uploadedFile->move(
                 $destination,
                 $newFilename
             );
                 $Livreur->setImage($newFilename);
           $a=$this->getDoctrine()->getManager();
           $a->flush();
           return $this->redirectToRoute('afficher');
        }
        return $this->render('nabil/livreur/modifier.html.twig',['livreur1Form'=>$form->createView()]);
    }

     /**
   * Creates a new ActionItem entity.
   *
   * @Route("/search", name="ajax_search")
   * @Method("GET")
   */
  public function searchAction(Request $request)
  {
      $em = $this->getDoctrine()->getManager();

      $requestString = $request->get('q');

      $entities =  $em->getRepository(Livreur::class)->findEntitiesByString($requestString);

      if(!$entities) {
          $result['Livreur']['error'] = "keine Einträge gefunden";
      } else {
          $result['Livreur'] = $this->getRealEntities($entities);
      }

      return new Response(json_encode($result));
  }

  public function getRealEntities($entities){

      foreach ($entities as $entity){
          $realEntities[$entity->getCin()] = [$entity->getPrenom(),$entity->getImage()];
      }

      return $realEntities;
  }

<<<<<<< HEAD
    /**
     * @Route("/detail/{cin}", name="detail")
     */
    public function nabil($cin)
    {
        $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
        $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->findAll();
        $tableau= array();
        foreach ($Livraison as $l)
        {  if($l->getCinlivreur()== $Livreur)
            array_push($tableau, $l);

        }
        return $this->render('nabil/back/nabil.html.twig',['livraison'=>$tableau]);

    }
=======
  /**
     * @Route("/detail/{cin}", name="detail")
     */
public function nabil($cin)
{
    $Livreur=$this->getDoctrine()->getRepository(Livreur::class)->find($cin);
    $Livraison=$this->getDoctrine()->getRepository(Livraison::class)->findAll();
    $tableau= array();
    foreach ($Livraison as $l)
    {  if($l->getCinlivreur()== $Livreur)
        array_push($tableau, $l);

    }
    return $this->render('nabil/back/nabil.html.twig',['livraison'=>$tableau]);

}
>>>>>>> 7deaab7f18e24151db3f68d940142e0ecf6b5a2a
}
