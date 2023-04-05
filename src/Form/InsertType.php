<?php

namespace App\Form;

use App\Entity\Autos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model')
            ->add('type')
            ->add('kleur', ChoiceType::class, [
                'choices' =>
                [
                    'Blauw' => 1,
                    'Rood' => 2,
                    'Groen' => 3,
                ]
            ])
            ->add('gewicht')
            ->add('prijs')
            ->add('voorraad')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Autos::class,
        ]);
    }
}
