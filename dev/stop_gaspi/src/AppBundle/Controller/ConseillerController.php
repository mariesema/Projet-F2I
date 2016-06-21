<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Conseiller;
use AppBundle\Form\ConseillerType;

/**
 * Conseiller controller.
 *
 */
class ConseillerController extends Controller
{
    /**
     * Lists all Conseiller entities.
     * @Route("/conseiller/index", name="conseiller_index")
     * @param Request $request
     * @return
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $request->request->all();
        $filtered = false;

        if (isset($post['is_filtered']) && $post['is_filtered']) {
            $filtered = true;
        }

        $conseiller = new Conseiller();
        $form = $this->createForm(ConseillerType::class, $conseiller);

        $conseillers = $em->getRepository('AppBundle:Conseiller')->findAll();
        $hydratedConseillers = array();
        foreach ($conseillers as $c) {
            //if ($filtered) {
                // $id correspond à l'entity Utilisateur.
                $id = $c->getId()->getId();
                $hydratedConseillers[$id]['nom'] = $c->getId()->getNom();
                $hydratedConseillers[$id]['prenom'] = $c->getId()->getPrenom();
                $hydratedConseillers[$id]['email'] = $c->getId()->getEmail();
                $hydratedConseillers[$id]['ville']['nom'] = $c->getId()->getVille()->getNom();
                $hydratedConseillers[$id]['ville']['dpt'] = $c->getId()->getVille()->getDepartement();
                $hydratedConseillers[$id]['ville']['cp'] = $c->getId()->getVille()->getCodePostal();
                $hydratedConseillers[$id]['ville']['id'] = $c->getId()->getVille()->getId();
                $hydratedConseillers[$id]['username'] = $c->getId()->getUsername();
                $hydratedConseillers[$id]['heureDeb'] = $c->getDisponibilites()->getHeureDeb();
                $hydratedConseillers[$id]['heureFin'] = $c->getDisponibilites()->getHeureFin();
            ///}
        }

        return $this->render(
            'conseiller/index.html.twig',
            array('conseillersH' => $hydratedConseillers,
                  'form'         => $form->createView(),
                  'filtered'   => $filtered
                )
        );
    }

    /**
     * Creates a new Conseiller entity.
     * @Route("/conseiller/new", name="conseiller_new")
     */
    public function newAction(Request $request)
    {
        $conseiller = new Conseiller();
        $form = $this->createForm('AppBundle\Form\ConseillerType', $conseiller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conseiller);
            $em->flush();

            return $this->redirectToRoute('conseiller_show', array('id' => $conseiller->getId()));
        }

        return $this->render('conseiller/new.html.twig', array(
            'conseiller' => $conseiller,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conseiller entity.
     * @Route("/conseiller/show", name="conseiller_show")
     */
    public function showAction(Conseiller $conseiller)
    {
        $deleteForm = $this->createDeleteForm($conseiller);

        return $this->render('conseiller/show.html.twig', array(
            'conseiller' => $conseiller,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Conseiller entity.
     * @Route("/conseiller/edit", name="conseiller_edit")
     */
    public function editAction(Request $request, Conseiller $conseiller)
    {
        $deleteForm = $this->createDeleteForm($conseiller);
        $editForm = $this->createForm('AppBundle\Form\ConseillerType', $conseiller);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conseiller);
            $em->flush();

            return $this->redirectToRoute('conseiller_edit', array('id' => $conseiller->getId()));
        }

        return $this->render('conseiller/edit.html.twig', array(
            'conseiller' => $conseiller,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Conseiller entity.
     * @Route("/conseiller/delete", name="conseiller_delete")
     */
    public function deleteAction(Request $request, Conseiller $conseiller)
    {
        $form = $this->createDeleteForm($conseiller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conseiller);
            $em->flush();
        }

        return $this->redirectToRoute('conseiller_index');
    }

    /**
     * Creates a form to delete a Conseiller entity.
     *
     * @param Conseiller $conseiller The Conseiller entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conseiller $conseiller)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conseiller_delete', array('id' => $conseiller->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}