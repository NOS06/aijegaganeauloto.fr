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
            ->add('ball1', IntegerType::class, [
                'label' => 'Boule 1'
            ])
            ->add('ball2', IntegerType::class, [
                'label' => 'Boule 2'
            ])
            ->add('ball3', IntegerType::class, [
                'label' => 'Boule 3'
            ])
            ->add('ball4', IntegerType::class, [
                'label' => 'Boule 4'
            ])
            ->add('ball5', IntegerType::class, [
                'label' => 'Boule 5'
            ])
            ->add('luckyNumber', IntegerType::class, [
                'label' => 'Numéro chance'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DidIWinDto::class,
        ]);
    }
}
