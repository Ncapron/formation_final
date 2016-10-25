<?php

namespace FormationBundle\Controller;

use FormationBundle\Entity\Commentaire;
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


        $promotion = $em->getRepository('FormationBundle:Promotion')->findOneBy(array('id' => $id));
        $eleve = $em->getRepository('FormationBundle:Eleve')->findOneBy(array('id' => $id));
        $module = $em->getRepository('FormationBundle:Module')->findBy(array(
            'eleve' => $eleve,
            'promotion' => $promotion,
        ));
        $notes = $em->getRepository('FormationBundle:Note')->findBy(array(
            'eleve' => $eleve,
            'promotion' => $promotion,
            ));
        $commentaires = $em->getRepository('FormationBundle:Commentaire')->findById($id);


        $note = new Note();
        $form = $this->createForm('FormationBundle\Form\NoteType', $note);
        $form->handleRequest($request);
        //var_dump($notes);die;
        if ($form->isSubmitted())
        {
            foreach ($notes as $n) {
                $del = $this->createDeleteForm($n);
                $del->handleRequest($request);


                $em->remove($n);
                $em->flush();
            }

            for ($i=0; $i < count($_POST['note']); $i++)
            {
                $note = new Note();
                $note->setEleve($eleve);
                $note->setPromotion($promotion);
                $note->setNote($_POST['note'][$i]);
                $em->persist($note);
                $em->flush();
            }


            return $this->redirectToRoute('eleve_index', array('id' => $note->getId()));
        }

        return $this->render('FormationBundle:Default:index.html.twig', array(
            'module' => $module,
            'eleve' => $eleve,
            'note' => $note,
            'notes'=>$notes,
            'form' => $form->createView(),
            'promotion' => $promotion,
            'commentaire' => $commentaires
        ));
    }

    private function createDeleteForm(Note $note)
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