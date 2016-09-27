<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

// https://symfony.com/doc/current/routing.html#controller-naming-pattern
$home = new Route('/', array('_controller' => 'Api\Home::index'));
$routes->add('home', $home);

//
$create = new Route('/home/{id}',
  array(
    '_controller' => 'Api\Home::read'),
  array(
    'id' => '\d+'
  )
);
$routes->add('create', $create);

return $routes;
