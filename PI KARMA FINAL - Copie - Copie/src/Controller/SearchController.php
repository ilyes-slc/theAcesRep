<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
  /*  public function index(): Response
    {
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class)
            ->add('search', SubmitType::class, [
                'attr' => [
                    'class' => 'fa fa-search'
                ]
            ])
            ->getForm();
        return $this->render('blog/blog3.html.twig', [
            'controller_name' => 'SearchController',
            'form' => $form->createView(),
        ]);


    }*/





}
