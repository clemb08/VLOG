<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class InterviewController extends AbstractController
{
    /**
    * @Route("/interview", name="interview")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:Interview');
        $firstInterview = $em->findLastArticles();
  
        $listInterview = $em->findFollowArticles();



        return $this->render('index/interview/indexInterview.html.twig', array(
        'firstInterview' => $firstInterview,
        'listInterview' => $listInterview,
        ));
    }

}
