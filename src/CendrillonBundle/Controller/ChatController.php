<?php

namespace CendrillonBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CendrillonBundle\Entity\Chat;


class ChatController extends Controller
{
/**
 * @Route("/chat", name="chat")
 * @return \Symfony\Component\HttpFoundation\Response
 */
public function indexAction()
{


    $chats = $this->getDoctrine()->getRepository("CendrillonBundle:Chat")->findAll(); //récupération de chaque entrée de l'entité chat

    return $this->render('CendrillonBundle:Default:Chat.html.twig',["chats" => $chats ]);
}
}
