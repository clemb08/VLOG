<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TravelAdviceController extends AbstractController
{
    /**
    * @Route("/traveladvice", name="traveladvice")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:TravelAdvice');
        $firstTravelAdvice = $em->findLastArticles();
  
        $listTravelAdvice = $em->findFollowArticles();



        return $this->render('index/travelAdvice/indexTravelAdvice.html.twig', array(
        'firstTravelAdvice' => $firstTravelAdvice,
        'listTravelAdvice' => $listTravelAdvice,
        ));
    }

    /**
     * @Route("/travel/{id}", name="viewTravel")
     */
    public function viewTravel($id)
    {
        //Utilisation de la méthode find
    $em = $this->getDoctrine()->getManager();

    $travel = $em->getRepository('App:TravelAdvice')->find($id);
    if (null === $travel)
    {
      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
    }

    return $this->render('index/traveladvice/view.html.twig', array(
      'travel' => $travel,
     // 'listComments' => $listComments,
    ));
    }
}
