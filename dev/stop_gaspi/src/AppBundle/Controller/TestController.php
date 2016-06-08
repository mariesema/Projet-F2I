<?php

// src/AppBundle/Controller/TestController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    /**
     * @Route("/entity-remove/{count}", defaults={"count" = 1}, name="number_action")
     *
     */
    public function numberAction($count)
    {
        $numbers = '<html><body>';
        for ($i=1; $i<$count+1; $i++) {
            $numbers .= 'Lucky number ' . $i . ': '.rand(0, 100).'<br/>';
        }
        $numbers .= '</body></html>';

        return new Response(
            $numbers
        );
    }

    /**
     * @Route("/rand-number-templated/{count}", defaults={"count" = 1}, name="number_action_templated")
     *
     */
    public function numberActionTemplated($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        $html = $this->render(
            'test/number.html.twig',
            array('numberList' => $numbersList)
        );

        /* Même chose qu'au dessus, plus verbeux pour comprendre que le templating vient du container ajouté grace a l'extend de controller. ))) */
        /*$html = $this->container->get('templating')->render(
            'test/number.html.twig',
            array('numberList' => $numbersList)
        );*/

        return new Response($html);
    }


    /**
     * @Route("/api/test/number", name="api_number_action")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        /*
         *  Ici avec l'ajout du JsonResponse !! (Vie simple ;)
         *  calls json_encode and sets the Content-Type header
         *
         */

        return new JsonResponse($data);

        /* Ici si on n'avait pas ajouté le use Symfony\Component\HttpFoundation\JsonResponse; (Vie compliquée) */
        //return new Response(
        //    json_encode($data),
        //    200,
        //    array('Content-Type' => 'application/json')
        //);

    }

}