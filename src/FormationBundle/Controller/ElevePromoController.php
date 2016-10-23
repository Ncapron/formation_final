<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\ElevePromo;
use FormationBundle\Form\ElevePromoType;

/**
 * ElevePromo controller.
 *
 */
class ElevePromoController extends Controller
{
    /**
     * Lists all ElevePromo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $elevePromos = $em->getRepository('FormationBundle:ElevePromo')->findAll();

        return $this->render('elevepromo/index.html.twig', array(
            'elevePromos' => $elevePromos,
        ));
    }

    /**
     * Creates a new ElevePromo entity.
     *
     */
    public function newAction(Request $request)
    {
        $elevePromo = new ElevePromo();
        $form = $this->createForm('FormationBundle\Form\ElevePromoType', $elevePromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($elevePromo);
            $em->flush();

            return $this->redirectToRoute('elevepromo_show', array('id' => $elevePromo->getId()));
        }

        return $this->render('elevepromo/new.html.twig', array(
            'elevePromo' => $elevePromo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ElevePromo entity.
     *
     */
    public function showAction(ElevePromo $elevePromo)
    {
        $deleteForm = $this->createDeleteForm($elevePromo);

        return $this->render('elevepromo/show.html.twig', array(
            'elevePromo' => $elevePromo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ElevePromo entity.
     *
     */
    public function editAction(Request $request, ElevePromo $elevePromo)
    {
        $deleteForm = $this->createDeleteForm($elevePromo);
        $editForm = $this->createForm('FormationBundle\Form\ElevePromoType', $elevePromo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($elevePromo);
            $em->flush();

            return $this->redirectToRoute('elevepromo_edit', array('id' => $elevePromo->getId()));
        }

        return $this->render('elevepromo/edit.html.twig', array(
            'elevePromo' => $elevePromo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ElevePromo entity.
     *
     */
    public function deleteAction(Request $request, ElevePromo $elevePromo)
    {
        $form = $this->createDeleteForm($elevePromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($elevePromo);
            $em->flush();
        }

        return $this->redirectToRoute('elevepromo_index');
    }

    /**
     * Creates a form to delete a ElevePromo entity.
     *
     * @param ElevePromo $elevePromo The ElevePromo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ElevePromo $elevePromo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('elevepromo_delete', array('id' => $elevePromo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
