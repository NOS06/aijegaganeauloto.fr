<?php

namespace App\Form;

use App\DidIWinDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DidIWinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ball1', IntegerType::class)
            ->add('ball2', IntegerType::class)
            ->add('ball3', IntegerType::class)
            ->add('ball4', IntegerType::class)
            ->add('ball5', IntegerType::class)
            ->add('luckyNumber', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DidIWinDto::class,
        ]);
    }
}
