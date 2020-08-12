<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class RecipeController extends AbstractController
{
    /**
    * @Route("/recipe", name="recipe")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:Recipe');
        $firstRecipe = $em->findLastArticles();
  
        $listRecipe = $em->findFollowArticles();



        return $this->render('index/recipe/indexRecipe.html.twig', array(
        'firstRecipe' => $firstRecipe,
        'listRecipe' => $listRecipe,
        ));
    }

}
