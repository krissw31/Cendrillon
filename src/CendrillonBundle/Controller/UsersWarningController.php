<?php

namespace CendrillonBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersWarningController extends Controller
{
    /**
     * @Route("/userswarning", name="userswarning")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $users = $this->getDoctrine()->getRepository("CendrillonBundle:User")->findAll();


        foreach ($users as $user ){
            $userswarning [] = $user->getAvertissement();
            foreach ($userswarning as $userwarning){

            }

        }









        return $this->render('CendrillonBundle:Default:userswarning.html.twig', array('userswarning' => $userswarning));
    }
}
