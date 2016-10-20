<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Module;
use FormationBundle\Form\ModuleType;
use FormationBundle\Entity\Note;
use FormationBundle\Form\NoteType;

class DefaultController extends Controller
{
    public function indexAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $module = $em->getRepository('FormationBundle:Module')->findById($id);
        $promotion = $em->getRepository('FormationBundle:Promotion')->findBy($id);
        $eleve = $em->getRepository('FormationBundle:Eleve')->findById($id);

        $note = new Note();
        $form = $this->createForm('FormationBundle\Form\NoteType', $note);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            //var_dump($_POST["note"]);die;
            $em = $this->getDoctrine()->getManager();
            for ($i=0; $i < count($_POST['note']) - 1; $i++)
            {
                $note->setNote($_POST['note'][$i]);
                $em->persist($note);
                $em->flush();
            }


            return $this->redirectToRoute('formation_homepage', array('id' => $note->getId()));
        }

        return $this->render('FormationBundle:Default:index.html.twig', array(
            'module' => $module,
            'eleve' => $eleve,
            'note' => $note,
            'form' => $form->createView(),
            'promotion' => $promotion,
        ));
    }
}