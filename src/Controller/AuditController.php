<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AuditController extends AbstractController
{
    /**
    * @Route("/report", name="report")
    */
    public function index()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('App:Audit');
        $firstFP = $em->findLastArticles();
  
        $listFP = $em->findFollowArticles();



        return $this->render('index/audit/indexAudit.html.twig', array(
        'firstFP' => $firstFP,
        'listFP' => $listFP,
        ));
    }

}
