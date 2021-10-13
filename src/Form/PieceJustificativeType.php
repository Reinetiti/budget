<?php

namespace App\Form;

use App\Entity\PieceJustificative;
use App\Entity\DemandeEngagement;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PieceJustificativeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref', IntegerType::class,[
                'label'=>'Référence',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('libPiece', TextType::class,[
                'label'=>'Libellé',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('datePiece', DateType::class,[
                'label'=>'Date',
                'attr' => [
                    'class'=>'form-control cc-name valid'
                    // 'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('numDemande', EntityType::class,[
                'class'=>DemandeEngagement::class,
                'label'=>'N° Demande',
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
            'data_class' => PieceJustificative::class,
        ]);
    }
}
