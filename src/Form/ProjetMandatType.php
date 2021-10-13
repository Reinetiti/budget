<?php

namespace App\Form;

use App\Entity\ProjetMandat;
use App\Entity\Engagement;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetMandatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateProjet', DateType::class,[
                'label'=>'Date',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('objetProjet', TextareaType::class,[
                'label'=>'Objet',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('numEngagement', EntityType::class,[
                'class'=>Engagement::class,
                'label'=>'N° engagement',
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
            'data_class' => ProjetMandat::class,
        ]);
    }
}
