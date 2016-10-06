<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArchiveController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eleves = $em->getRepository('FormationBundle:Eleve')->findAll();

        return $this->render('FormationBundle:archive:archive.html.twig', array(
            'eleves' => $eleves,
        ));
    }
}
