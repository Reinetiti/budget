<?php

namespace App\Form;

use App\Entity\Budgetisation;
use App\Entity\Rubrique;
use App\Entity\Uniteadmin;
use App\Entity\Action;
use App\Entity\Typebudget;
use App\Entity\Exercice;
use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BudgetisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', IntegerType::class,[
                'label'=>'Imputation',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('cp', IntegerType::class,[
                'label'=>'Crédit de paiement',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('ae', IntegerType::class,[
                'label'=>'Autorisation Engagement',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('typebudgetid', EntityType::class,[
                'class'=>Typebudget::class,
                'label'=>'Type de budget',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('rubriqueid', EntityType::class,[
                'class'=>Rubrique::class,
                'label'=>'Rubrique',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('uniteid', EntityType::class,[
                'class'=>Uniteadmin::class,
                'label'=>'Unité Administrative',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('actionid', EntityType::class,[
                'class'=>Action::class,
                'label'=>'Action',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('classeid', EntityType::class,[
                'class'=>Classe::class,
                'label'=>'Classe',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
            ->add('annee', EntityType::class,[
                'class'=>Exercice::class,
                'label'=>'Exercice',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Budgetisation::class,
        ]);
    }
}
