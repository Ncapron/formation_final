<?php

namespace FormationBundle\Controller;

use Doctrine\ORM\Mapping\Id;
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
    public function indexAction( Request $request, Promotion $promotion, Eleve $ideleve, Module $module)
    {
        $em = $this->getDoctrine()->getManager();

        $note = new Note();
        $form = $this->createForm('FormationBundle\Form\NoteType', $note);
        $form->handleRequest($request);

        $modules = $ideleve->getModule()->getValues();

        if ($form->isSubmitted()) {

            $em->getRepository('FormationBundle:Note')->findNotesByEleveprom($promotion, $ideleve, $module);
            unset($_POST['note']['_token']);

            $stop = $promotion->getSemaines();
            $i=1;
            $nbmodule =0;
            foreach ($_POST['note'] as $value_note) {

                $note = new Note();
                $note->setEleve($ideleve);
                $note->setPromotion($promotion);
                if  ($i > $stop*2+1) {
                    $i = 0;
                    $nbmodule++;
                }
                $note->setModule($modules[$nbmodule]);
                $note->setNote($value_note);
                $em->persist($note);
                $em->flush();
                //unset($note);
                $i++;
                
            }

            $em->getRepository('FormationBundle:Commentaire')->findCommentaireByPromeleve($promotion, $ideleve);

            foreach ($_POST['commentaire'] as $com)
            {
                $commentaire = new Commentaire();
                $commentaire->setMessage($com);
                $commentaire->setPromotion($promotion);
                $commentaire->setEleve($ideleve);

                $em->persist($commentaire);
                $em->flush();
            }


            //redirectToRoute('eleve_index', array('id' => $note->getId()));
        }

        
        $notes = $em->getRepository('FormationBundle:Note')->findBy(array('eleve' => $ideleve, 'promotion' => $promotion));
        $commentaires = $em->getRepository('FormationBundle:Commentaire')->findBy(array('eleve' => $ideleve, 'promotion' => $promotion));


        return $this->render('FormationBundle:Default:index.html.twig', array(
            'notes' => $notes,
            'modules' => $modules,
            'eleve' => $ideleve,
            'note' => $note,
            'form' => $form->createView(),
            'promotion' => $promotion,
            'commentaires' => $commentaires,
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