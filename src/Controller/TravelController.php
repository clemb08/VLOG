<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TravelController extends AbstractController
{
    /**
    * @Route("/travel", name="travel")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:Travel');
        $firstTravel = $em->findLastArticles();
  
        $listTravel = $em->findFollowArticles();



        return $this->render('index/travel/indexTravel.html.twig', array(
        'firstTravel' => $firstTravel,
        'listTravel' => $listTravel,
        ));
    }

    /**
     * @Route("/travel/{id}", name="viewTravel")
     */
    public function viewTravel($id)
    {
        //Utilisation de la méthode find
    $em = $this->getDoctrine()->getManager();

    $travel = $em->getRepository('App:Travel')->find($id);
    if (null === $travel)
    {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }

    return $this->render('index/travel/view.html.twig', array(
      'travel' => $travel,
     // 'listComments' => $listComments,
    ));
    }
}
