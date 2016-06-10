<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('ficheconseil_index', new Route(
    '/',
    array('_controller' => 'AppBundle:FicheConseil:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('ficheconseil_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:FicheConseil:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('ficheconseil_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:FicheConseil:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('ficheconseil_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:FicheConseil:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('ficheconseil_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:FicheConseil:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
