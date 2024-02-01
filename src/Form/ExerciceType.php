<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\Intensity;
use App\Entity\Muscle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExerciceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('muscle', EntityType::class, [
                'class' => Muscle::class,
'choice_label' => 'name',
            ])
            ->add('intensity', EntityType::class, [
                'class' => Intensity::class,
'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercice::class,
        ]);
    }
}
