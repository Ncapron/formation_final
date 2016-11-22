<?php

namespace FormationBundle\Controller;

use FormationBundle\Entity\Commentaire;
use FormationBundle\Entity\Eleve;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Module;
use FormationBundle\Entity\Promotion;
use FormationBundle\Form\PromotionType;
use FormationBundle\Form\ModuleType;
use FormationBundle\Entity\Note;
use FormationBundle\Form\NoteType;

class DefaultController extends Controller
{
    public function indexAction( Request $request, Promotion $promotion, Eleve $ideleve)
    {
        $em = $this->getDoctrine()->getManager();

        $note = new Note();
        $form = $this->createForm('FormationBundle\Form\NoteType', $note);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em->getRepository('FormationBundle:Note')->findNotesByEleveprom($promotion, $ideleve);
            unset($_POST['note']['_token']);
            foreach ($_POST['note'] as $value_note) {

                echo $value_note;
                $note = new Note();
                $note->setEleve($ideleve);
                $note->setPromotion($promotion);
                $note->setNote($value_note);
                $em->persist($note);
                $em->flush();
                //unset($note);

                return $this->redirectToRoute('promotion_index');

            }


            //redirectToRoute('eleve_index', array('id' => $note->getId()));
        }
        $modules = $ideleve->getModule()->getValues();
        
        $notes = $em->getRepository('FormationBundle:Note')->findBy(array('eleve' => $ideleve, 'promotion' => $promotion));


        return $this->render('FormationBundle:Default:index.html.twig', array(
            'notes' => $notes,
            'modules' => $modules,
            'eleve' => $ideleve,
            'note' => $note,
            'form' => $form->createView(),
            'promotion' => $promotion,
        ));
    }


    public function createDeleteForm(Note $note)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('note_delete', array('id' => $note->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * Creates a new Commentaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $commentaire = new Commentaire();
        $form = $this->createForm('FormationBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();

            return $this->redirectToRoute('commentaire_show', array('id' => $commentaire->getId()));
        }

        return $this->render('FormationBundle:Default:index.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ));
    }


}