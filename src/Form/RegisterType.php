<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
        
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
            
            ->add('phone', IntegerType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
            ->add('photo', FileType::class, [
                'attr' => [
                    'class' => 'h-full-width']

            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
