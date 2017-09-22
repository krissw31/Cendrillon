<?php

namespace CendrillonBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class UsersonlineController extends Controller
{
    /**
     * @Route("/usersonline", name="usersonline")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $usersonline = $this->getDoctrine()->getRepository("CendrillonBundle:Users_online")->findAll();

        return $this->render('CendrillonBundle:Default:usersonline.html.twig', array('usersonline' => $usersonline));
    }
}
