<?php

namespace App\Controller;

use App\Entity\Sponsors;
use App\Form\SponsorsType;
use App\Repository\SponsorsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Sluggable\Util\Urlizer;

/**
 * @Route("/sponsors")
 */
class SponsorsController extends AbstractController
{
    /**
     * @Route("/", name="sponsors_index", methods={"GET"})
     */
    public function index(SponsorsRepository $sponsorsRepository): Response
    {
        return $this->render('amal/sponsors/index.html.twig', [
            'sponsors' => $sponsorsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sponsors_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sponsor = new Sponsors();
        $form = $this->createForm(SponsorsType::class, $sponsor);
        $form->handleRequest($request);

        $brochureFile = $form->get('logo')->getData();

        // this condition is needed because the 'brochure' field is not required
        // so the PDF file must be processed only when a file is uploaded
        if ( $form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['logo']->getData();
            $pathupload = $this->getParameter('kernel.project_dir').'/public/uploads/images';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $pathupload,
                $newFilename
            );

            $sponsor->setLogo($originalFilename);
            $entityManager->persist( $sponsor);
            $entityManager->flush();
            // updates the 'brochureFilename' property to store the PDF file name
            // instead of its contents

            return $this->redirectToRoute('sponsors_index', [], Response::HTTP_SEE_OTHER);

        }


       return $this->render('amal/sponsors/new.html.twig', [
           'sponsor' => $sponsor,
           'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sponsors_show", methods={"GET"})
     */
    public function show(Sponsors $sponsor): Response
    {
        return $this->render('amal/sponsors/show.html.twig', [
            'sponsor' => $sponsor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sponsors_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Sponsors $sponsor, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SponsorsType::class, $sponsor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('sponsors_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('amal/sponsors/edit.html.twig', [
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sponsors_delete", methods={"POST"})
     */
    public function delete(Request $request, Sponsors $sponsor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sponsor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sponsor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sponsors_index', [], Response::HTTP_SEE_OTHER);
    }























}
