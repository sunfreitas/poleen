<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * @todo Esta parte tem que ser reduzida a uma função.
 * @todo E ficar isolada em um outro arquivo de preferência. Sugestão: RouteProvider.php
 */
$routes = new RouteCollection();

$home = new Route('/home', array('controller' => 'Api\Home', 'method' => 'index'));
$routes->add('home', $home);

$create = new Route('/home/create', array('controller' => 'Api\Home', 'method' => 'create'));
$routes->add('create', $create);

return $routes;
