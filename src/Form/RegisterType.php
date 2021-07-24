<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints\Email;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', Type\ChoiceType::class, [
                'choices'  => [
                    'Mr.' => 'mr',
                    'Mrs.' => 'mrs',
                    'Ms.' => 'ms',
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('first_name', Type\TextType::class, [])
            ->add('last_name', Type\TextType::class, [])
            ->add('email', Type\EmailType::class, [
                'constraints' => [new Email([
                    'message' => 'The email "{{ value }}" is not a valid email.'
                ])]
            ])
            ->add('phone', Type\TelType::class)
            ->add('country', Type\CountryType::class, [
                'preferred_choices' => ['CZ', 'US']
            ])
            ->add('privacy_policy', Type\CheckboxType::class)
            ->add('newsletter', Type\CheckboxType::class, [
                'label' => 'Do you want to receive news about this project? Sign up to the NEWSLETTER.',
                'required' => false
            ])
            ->add('save', Type\SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
