<?php

namespace App\Form;

use App\Entity\Citizen;
use App\Entity\Passport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PassportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('passNum')
            ->add('citizen', EntityType::class, [
                'class' => Citizen::class,
                'choice_label' => 'name',
                'placeholder' => 'Select Citizen',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Passport::class,
        ]);
    }
}