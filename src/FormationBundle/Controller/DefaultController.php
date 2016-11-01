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
            if (!empty($notes)) {
                foreach ($notes as $n) {
                    $query = $em->getRepository('FormationBundle:Note')->createQueryBuilder('DELETE n FROM note n WHERE n.id = :id');
                    $query->setParameter('id', $n);
                    $query->execute();
                }
            }

            for ($i = 0; $i < count($_POST['note']); $i++) {
                $note = new Note();
                $note->setEleve($ideleve);
                $note->setPromotion($promotion);
                $note->setNote($_POST['note'][$i]);
                $em->persist($note);
                $em->flush();
                unset($note);
            }


            return $this->redirectToRoute('eleve_index', array('id' => $note->getId()));
        }

        $modules = $em->getRepository('FormationBundle:Module')->findModule($ideleve);
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