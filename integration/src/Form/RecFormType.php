<?php

namespace App\Form;


use App\Entity\Reclamation;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;  
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

use Symfony\Component\Validator\Constraints as Assert; 

class RecFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add(
                'description', TextareaType::class , [
                'error_bubbling' => false,
                'required' => true,
                ],
            )
            ->add('target', ChoiceType::class, [
                'choices'  => [
                    'Product' => 'Product',
                    'Tournament' => 'Tournament',
                    'Deliverer' => 'Deliverer',
                ],
            ])
            ->add('method_remb', ChoiceType::class, [
                'choices'  => [
                    'Reparation' => 'Reparation',
                    'Refund' => 'Refund',
                    'Change' => 'Change',
                ],
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save btn btn--pill btn--green'],
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'novalidate' => 'novalidate', // comment me to reactivate the html5 validation!  🚥
            ]
        ]);
}
}
