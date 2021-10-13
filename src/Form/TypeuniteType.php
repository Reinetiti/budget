<?php

namespace App\Form;

use App\Entity\Typeunite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeuniteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typecode', TextType::class,[
                'label'=>'Code',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('libtypeUnite', TextType::class,[
                'label'=>'Libellé',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Typeunite::class,
        ]);
    }
}
