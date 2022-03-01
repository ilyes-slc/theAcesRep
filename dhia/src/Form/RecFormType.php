<?php

namespace App\Form;


use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;  
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class RecFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('description')
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

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(array(
            'attr' => array('novalidate' => 'novalidate')
        ));
    }
}
