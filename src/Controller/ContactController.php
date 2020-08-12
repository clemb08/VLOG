<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(MailerInterface $mailer, Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);

        $email = (new Email())
            ->text($data['name'])
            ->from($data['from'])
            ->to('clem.boschet@gmail.com')
            ->subject($data['subject'])
            ->text($data['message'])
            ;

        $mailer->send($email);

        return $this->render('contact/sent.html.twig');
        }
        
        return $this->render('contact/index.html.twig', [
            'form_contact' => $form->createView(),
        ]);
    }}
