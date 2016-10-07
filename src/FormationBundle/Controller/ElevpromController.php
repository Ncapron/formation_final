<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ElevpromController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notes = $em->getRepository('FormationBundle:Note')->findBy(array('promotion_id' => $promotion_id, 'eleve_id' => $eleve_id));

        return $this->render('FormationBundle:Default:index.html.twig', array(
            'note' => $notes,
        ));
    }
}