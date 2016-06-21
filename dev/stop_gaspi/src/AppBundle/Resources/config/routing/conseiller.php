<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('conseiller_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Conseiller:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('conseiller_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Conseiller:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('conseiller_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Conseiller:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('conseiller_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Conseiller:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('conseiller_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Conseiller:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
