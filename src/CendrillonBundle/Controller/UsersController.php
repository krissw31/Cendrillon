<?php

namespace CendrillonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsersController extends Controller
{
    /**
     * @Route("/users", name="users")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findAll();
        $usersOnline = $this->getDoctrine()->getRepository("CendrillonBundle:Users_online")->findAll();


        return $this->render('CendrillonBundle:Default:users.html.twig', array('users' => $users,
            'usersOnline'=> $usersOnline));
    }
}
