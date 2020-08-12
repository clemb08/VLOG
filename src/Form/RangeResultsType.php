<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RangeType;


class RangeResultsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('longTermeResults', RangeType::class, [
                'label' => 'Access to the owner identity :',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'rangeResults'
                ]])
            ;
    }

}