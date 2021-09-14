<?php

namespace App\Form;

use App\Entity\Catservice;
use App\Entity\Typeunite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatserviceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libcat', TextType::class,[
                'label'=>'Libellé de la catégorie de service',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('catcode', TextType::class,[
                'label'=>'Code de la catégorie de service',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('typeid', EntityType::class,[
                'class'=>Typeunite::class,
                'label'=>'Type Unité Administrative',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Catservice::class,
        ]);
    }
}
