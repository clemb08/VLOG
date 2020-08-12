<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FPController extends AbstractController
{
    /**
    * @Route("/foodandpeople", name="foodandpeople")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:FoodandPeople');
        $firstFP = $em->findLastArticles();
  
        $listFP = $em->findFollowArticles();



        return $this->render('index/FoodandPeople/indexFP.html.twig', array(
        'firstFP' => $firstFP,
        'listFP' => $listFP,
        ));
    }

}
