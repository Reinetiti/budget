<?php

namespace App\Form;

use App\Entity\Typepgram;
use App\Entity\Programme;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypepgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typepgramcode', TextType::class,[
                'label'=>'Code',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('libtypepgram', TextType::class,[
                'label'=>'Libellé',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('programmeid', EntityType::class,[
                'class'=>Programme::class,
                'label'=>'Programme',
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
            'data_class' => Typepgram::class,
        ]);
    }
}
