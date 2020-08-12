<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Form\Form;
use App\Form\AuditType;
use App\Entity\Audit;


class AdminController extends EasyAdminController
{
    public function createAuditNewForm(Audit $entity, $fields)
    {

        $fields = $this->createForm(AuditType::class, $entity);

        $fields->getform();

        return $this->render('form/new.html.twig', [
            'form' => $fields->createView(),
        ]);
    }
}