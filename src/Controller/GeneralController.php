<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class GeneralController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
      $em = $this->getDoctrine()->getManager();
      
      $getFP = $em->getRepository('App:FoodandPeople');

      $getT = $em->getRepository('App:Travel');

      $getV = $em->getRepository('App:Volunteer');
      
      $firstRecipe = $getFP->findLastArticle();

      $nextRecipe = $getFP->findNextArticles();

      $listRecipe = $getFP->findNextFollowArticles();

      $firstTravel = $getT->findLastArticle();

      $nextTravel = $getT->findNextArticles();

      $listTravel = $getT->findNextFollowArticles();

      $firstVolunteer = $getV->findLastArticle();

      $nextVolunteer = $getV->findNextArticles();

      $listVolunteer = $getV->findNextFollowArticles();
        
      return $this->render('home.html.twig', array(
        'firstRecipe' => $firstRecipe,
        'nextRecipe' => $nextRecipe,
        'listRecipe' => $listRecipe,
        'firstTravel' => $firstTravel,
        'nextTravel' => $nextTravel,
        'listTravel' => $listTravel,
        'firstVolunteer' => $firstVolunteer,
        'nextVolunteer' => $nextVolunteer,
        'listVolunteer' => $listVolunteer,
      ));
    }

    /**
     * @Route("/recipe/{id}", name="viewRecipe")
     */
    public function viewRecipe($id)
    {
        //Utilisation de la méthode find
    $em = $this->getDoctrine()->getManager();

    $recipe = $em->getRepository('App:Recipe')->find($id);

    //$advert est donc une instance de App//Advert
    //ou null d'ou le if
    if (null === $recipe)
    {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }

    //Récupération de la liste des candidatures de l'annonce
    //$listComments = $em
     // ->getRepository('App:Comments')
     // ->findBy(array('recipe' => $recipe));

    return $this->render('recipe\\view.html.twig', array(
      'recipe' => $recipe,
     // 'listComments' => $listComments,
    ));
    }

     /**
     * @Route("/interview/{id}", name="viewInterview")
     */
    public function viewInterview($id)
    {
        //Utilisation de la méthode find
    $em = $this->getDoctrine()->getManager();

    $recipe = $em->getRepository('App:Interview')->find($id);

    //$advert est donc une instance de App//Advert
    //ou null d'ou le if
    if (null === $interview)
    {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }

    //Récupération de la liste des candidatures de l'annonce
    //$listComments = $em
     // ->getRepository('App:Comments')
     // ->findBy(array('recipe' => $recipe));

    return $this->render('recipe\\viewInterview.html.twig', array(
      'interview' => $interview,
     // 'listComments' => $listComments,
    ));
    }


}
