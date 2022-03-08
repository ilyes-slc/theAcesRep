<?php

namespace App\Controller;

use App\Entity\Element;
use App\Entity\Promotion;
use App\Form\ElementFormType;
use App\Form\PromotionFormType;
use App\Repository\ElementRepository;
use App\Services\FileUploader;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Serializer;
use Knp\Component\Pager\PaginatorInterface;


class ElementController extends AbstractController
{
    /**
     * @Route("/element", name="element")
     */
    public function index(): Response
    {
        //$Element=$this->getDoctrine()->getRepository(Element::class)->findAll();
        return $this->render('mariem/element/index.html.twig', [
            'controller_name' => 'ElementController',
        ]);
        /* public function index()
     {$Element=$this->getDoctrine()->getRepository(Element::class)->findAll();
         return $this->render('element/index.html.twig', [
             'controller_name' => 'ElementController',
         ]);*/
    }

    /**
     * @Route("/ajouterElement", name="ajouterElement",methods={"GET","POST"}))
     * @param Request $req
     * @param FileUploader $fileUploader
     * @return Response
     *
     */

    public function Ajouter(Request $req): Response
    {
        $Element = new Element();

        // $response = new QrCodeResponse($result);
        $formClassroom = $this->createForm(ElementFormType::class, $Element);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid()))
        {

            $uploadedFile = $formClassroom['image']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );
            $Element->setImage($newFilename);

            $entityManager=$this->getDoctrine()->getManager();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Element);
            $manager->flush();
            return $this->redirectToRoute('afficherElement');
        }
        return $this->render('mariem/element/AjouterElement.twig', ['Element' => $formClassroom->createView()]);


    }

    /**
     * @Route("/front/{id}/element", name="element_showFront", methods={"GET"})
     */
    public function show($id): Response
    {
        $element = $this->getDoctrine()->getManager()->getRepository(Element::class)->find($id);
        return $this->render('mariem/element/elementShow.html.twig', [
            'element' => $element,
        ]);
    }



    /**
     * @Route("/afficherElement", name="afficherElement")
     */
    public function AfficherElement(PaginatorInterface $paginator, Request $request,)
    {
        $repo = $this->getDoctrine()->getRepository(Element::class);
        $element2 = $repo->findAll();
        $element = $paginator->paginate(
            $element2, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            2 // Nombre de résultats par page
        );
        return $this->render('mariem/element/AfficherElement.twig', ["element" => $element]);
    }

    /**
     * @Route("/supprimerElement/{id}", name="e_supprimer")
     */
    public function supprimer($id)
    {
        $a=$this->getDoctrine()->getManager();
        $Element=$a->getRepository(Element::class)->find($id);
        $a->remove($Element);
        $a->flush();
        return $this->redirectToRoute('afficherElement');
    }
    /**
     * @Route ("/modifierElement/{id}", name="e_modifier")
     */
    public function modifier($id,Request $req)
    {
        $Element=$this->getDoctrine()->getRepository(Element::class)->find($id);
        $form=$this->createForm(ElementFormType::class,$Element);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {

            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherElement');
        }
        return $this->render('mariem/element/modifierElement.html.twig', [
            'Element'=>$form->createView()

        ]);
    }

    /**
     * @Route("/afficherElementFront", name="afficherElementFront")
     */
    public function AfficherElementFront()
    {
        $repo = $this->getDoctrine()->getRepository(Element::class);
        $element = $repo->findAll();
        return $this->render('mariem/element/AfficherElementFront.twig', ["element" => $element]);
    }


    /*
        /**
         * @Route("/mobile/add", name="add_element")
         */
    /*
    public function addElement(Request $request){

        $element= new Element();

        $nom= $request->query->get("nom");
        $prenom= $request->query->get("prenom");
        $sujet= $request->query->get("sujet");

        $element->setNom($nom);
        $element->setPrenom($prenom);
        $element->setSujet($sujet);
        $element->setImage("");

        $em=$this->getDoctrine()->getManager();
        $em->persist($element);
        $em->flush();
        $serialize = new Serializer([new ObjectNormalizer()]);
        $formatted = $serialize->normalize("element Ajoutée");
        return new JsonResponse($formatted);
    }
*/
    /**
     * @Route("/listeelement/test/test", name="listeelement")
     */

    public function indexMobile(ElementRepository $elementRepository, NormalizerInterface $normalizer)
    {
        $element=$elementRepository->findAll();
        $json=$normalizer->normalize($element,'json',['groups'=>'Element']);
        return new Response(json_encode($json));

    }
    /**
     * @Route("/test/deleteelement/{id}", name="deletecommentairemobile", methods={"POST","GET"})
     */
    public function RemoveelementJSON(Request $request,NormalizerInterface $Normalizer,$id )
    {
        $em=$this->getDoctrine()->getManager();
        $commentaire = $em->getRepository(Element::class)->find($id);
        $em->remove($commentaire);
        $em->flush();
        $jsonContent = $Normalizer->normalize("Element supprimer");
        return new Response("Reclamation deleted".json_encode($jsonContent));
    }
}