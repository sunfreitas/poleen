<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * @todo Esta parte tem que ser reduzida a uma função.
 * @todo E ficar isolada em um outro arquivo de preferência. Sugestão: RouteProvider.php
 */
$route = new Route('/home', array('controller' => 'Home', 'method' => 'index'));
$routes = new RouteCollection();
$routes->add('home', $route);

return $routes;
