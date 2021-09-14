<?php

namespace App\Form;

use App\Entity\Champcompetence;
use App\Entity\Commune;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampcompetenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libcompetence', TextType::class,[
                'label'=>'Libelé du champ de compétence',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('competencecode', TextType::class,[
                'label'=>'Code du champ de compétence',
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
            'data_class' => Champcompetence::class,
        ]);
    }
}
