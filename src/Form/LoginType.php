<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'E-mail',
                'class' => 'email'
            ],
        ])

        ->add('password', PasswordType::class, [
            'label' => false,
            'required' => true,
            'attr' => [
                'placeholder' => 'Mot de passe',
                'class' => 'password'
            ],
        ])
        
        ->add('submit', SubmitType::class, [
            'label' => "Connexion",
            'attr' => ['class' => 'login_button' ],
                
        ]);

    }
}