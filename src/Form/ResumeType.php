<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('street')
            ->add('housenumber')
            ->add('postcode')
            ->add('state')
            ->add('phone')
            ->add('email')
            ->add('company')
            ->add('company_name')
            ->add('company_lastname')
            ->add('company_address')
            ->add('resume_date')
            ->add('title')
            ->add('content')
            ->add('signature')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }
}
