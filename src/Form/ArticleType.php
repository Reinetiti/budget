<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libarticle',TextType::class,[
                'label'=>'Libelé Article',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],    
            ])
            ->add('articlecode',TextType::class,[
                'label'=>'Code Article',
                'attr' => [
                    'class'=>'appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
