<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\FicheConseil;
use AppBundle\Form\FicheConseilType;

/**
 * FicheConseil controller.
 *
 */
class FicheConseilController extends Controller
{
    /**
     * Lists all FicheConseil entities.
     * @Route("/fiche/index", name="fiche_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ficheConseils = $em->getRepository('AppBundle:FicheConseil')->findAll();

        return $this->render('ficheconseil/index.html.twig', array(
            'ficheConseils' => $ficheConseils,
        ));
    }

    /**
     * Creates a new FicheConseil entity.
     * @Route("/fiche/new", name="fiche_new")
     */
    public function newAction(Request $request)
    {
        $ficheConseil = new FicheConseil();
        $form = $this->createForm('AppBundle\Form\FicheConseilType', $ficheConseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheConseil);
            $em->flush();

            return $this->redirectToRoute('ficheconseil_show', array('id' => $ficheConseil->getId()));
        }

        return $this->render('ficheconseil/new.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FicheConseil entity.
     * @Route("/fiche/show", name="fiche_show")
     */
    public function showAction(FicheConseil $ficheConseil)
    {
        $deleteForm = $this->createDeleteForm($ficheConseil);

        return $this->render('ficheconseil/show.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FicheConseil entity.
     * @Route("/fiche/edit", name="fiche_edit")
     */
    public function editAction(Request $request, FicheConseil $ficheConseil)
    {
        $deleteForm = $this->createDeleteForm($ficheConseil);
        $editForm = $this->createForm('AppBundle\Form\FicheConseilType', $ficheConseil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheConseil);
            $em->flush();

            return $this->redirectToRoute('ficheconseil_edit', array('id' => $ficheConseil->getId()));
        }

        return $this->render('ficheconseil/edit.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FicheConseil entity.
     * @Route("/fiche/delete", name="fiche_delete")
     */
    public function deleteAction(Request $request, FicheConseil $ficheConseil)
    {
        $form = $this->createDeleteForm($ficheConseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ficheConseil);
            $em->flush();
        }

        return $this->redirectToRoute('ficheconseil_index');
    }

    /**
     * Creates a form to delete a FicheConseil entity.
     *
     * @param FicheConseil $ficheConseil The FicheConseil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FicheConseil $ficheConseil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ficheconseil_delete', array('id' => $ficheConseil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
