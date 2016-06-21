<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\RendezVous;

/**
 * Conseiller controller.
 *
 */
class RendezVousController extends Controller
{

    /**
     * Creates a new Conseiller entity.
     * @Route("/rendezvous/new", name="rendezvous_new")
     */
    public function newAction(Request $request)
    {
        // Needed :
        // Data user
        // data conseiller
        //
        var_dump($request->request->all());die;

        $rendezVous = new RendezVous();

        return $this->redirectToRoute('conseiller_index', array('params' => 'params'));
    }

}