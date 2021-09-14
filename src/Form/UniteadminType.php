<?php

namespace App\Form;

use App\Entity\Uniteadmin;
use App\Entity\Typeunite;
use App\Entity\Typeservice;
use App\Entity\Commune;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UniteadminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libunite', TextType::class,[
                'label'=>'Libellé',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('unitecode', TextType::class,[
                'label'=>'Code',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('typeid',EntityType::class,[
                'class'=>Typeunite::class,
                'label'=>'Type',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('serviceid', EntityType::class,[
                'class'=>Typeservice::class,
                'label'=>'Service',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('communeid', EntityType::class,[
                'class'=>Commune::class,
                'label'=>'Commune',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Uniteadmin::class,
        ]);
    }
}
