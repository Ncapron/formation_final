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
    public function indexAction($eleve_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $modules = $em->getRepository('FormationBundle:Module')->findAll();
        $eleve = $em->getRepository('FormationBundle:Eleve')->findById($eleve_id);
        $notes = $em->getRepository('FormationBundle:Note')->findBy(array('promotion_id' => $promotion_id, 'eleve_id' => $eleve_id));

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


            return $this->redirectToRoute('note_show', array('id' => $note->getId()));
        }

        return $this->render('FormationBundle:Default:index.html.twig', array(
            'modules' => $modules,
            'eleve' => $eleve,
            'note' => $note,
            'notes' => $notes,
            'form' => $form->createView(),
        ));
    }
}