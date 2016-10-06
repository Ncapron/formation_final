<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Module;
use FormationBundle\Form\ModuleType;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
    	$em = $this->getDoctrine()->getManager();

        $modules = $em->getRepository('FormationBundle:Module')->findAll();
        $eleve = $em->getRepository('FormationBundle:Eleve')->findById($id);


        return $this->render('FormationBundle:Default:index.html.twig', array(
        	'modules' => $modules,
            'eleve' => $eleve
        	));
    }
}
