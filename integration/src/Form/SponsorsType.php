<?php

namespace App\Form;

use App\Entity\Sponsors;
use App\Entity\Tournoi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\File;

use Symfony\Component\Form\Extension\Core\Type\FileType as FileTypeAlias;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SponsorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])

            ->add('logo', FileTypeAlias::class,[
                'data_class' => null,
                'attr' => ['class' => 'form-control'
                ]
            ])

            ->add('tournoi',EntityType::class,[
                'class'=>Tournoi::class,
                'attr' => ['class' => 'form-control' 
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sponsors::class,
        ]);
    }
}
