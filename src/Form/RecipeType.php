<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use App\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

class RecipeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recipe', EntityType::class, [
            // looks for choices from this entity
            'class' => Recipe::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'title',
        ]);
    }

}
