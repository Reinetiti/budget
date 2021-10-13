<?php

namespace App\Form;

use App\Entity\Misbudget;
use App\Entity\Misetat;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MisbudgetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('misbudgetcode', TextType::class,[
                'label'=>'Code',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('libmisbudget', TextType::class,[
                'label'=>'Libellé',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('misetatid', EntityType::class,[
                'class'=>Misetat::class,
                'label'=>'Mission Etat',
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
            'data_class' => Misbudget::class,
        ]);
    }
}
