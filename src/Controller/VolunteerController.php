<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class VolunteerController extends AbstractController
{
    /**
    * @Route("/volunteer", name="volunteer")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:Volunteer');
        $firstVolunteer = $em->findLastArticles();
  
        $listVolunteer = $em->findFollowArticles();



        return $this->render('index/volunteer/indexVolunteer.html.twig', array(
        'firstVolunteer' => $firstVolunteer,
        'listVolunteer' => $listVolunteer,
        ));
    }

}
