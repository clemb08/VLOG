<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FeeExistenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('feeExistence', ChoiceType::class, [
                'label' => 'Fee Existence :',
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
        ;
    }

}