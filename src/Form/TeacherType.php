<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TeacherType extends AbstractType {
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
    $builder
    ->add('name',TextType::class)
   ->add('fathername',TextType::class)
   ->add('email',EmailType::class)
   ->add('address',TextareaType::class)
   ->add('contactNumber', IntegerType::class)
   ->add('save',SubmitType::class,['label'=>'Add Teacher']);
   }
   public function configureOptions(OptionsResolver $resolver): void
   {
       $resolver->setDefaults([
           'data_class' => Teacher::class,
       ]);
   }
}