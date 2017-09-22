<?php

namespace CendrillonBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CendrillonBundle\Entity\Conseiller;


class ConseillerController extends Controller
{
    /**
     * @Route ("/conseiller", name="conseiller")
     *
     *
     */
    public function indexAction()
    {

        $conseillers = $this->getDoctrine()->getRepository("CendrillonBundle:Conseiller")->findAll();
        return $this->render('CendrillonBundle:Default:conseiller.html.twig', array('conseillers' => $conseillers));
    }
}
