<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('user_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Utilisateur:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('user_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Utilisateur:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('user_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Utilisateur:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('user_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Utilisateur:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('user_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Utilisateur:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
