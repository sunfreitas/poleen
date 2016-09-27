<?php
include('../vendor/autoload.php');

// Defining routes;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;

use Symfony\Component\HttpFoundation\Request;

// Agora eu carrego os arquivos de rotas aqui.
$base_api = dirname(__DIR__);

$locator = new FileLocator(array("{$base_api}/routes"));
$loader = new PhpFileLoader($locator);
$collection = $loader->load('api.php');

/**
 * @todo O que vem primeiro? A galinha ou ou ovo? Acho que as rotas devem variant_date_from_timestamp
 * primeiro como está aqui.
 */
$request = Request::createFromGlobals();

//
$context = new RequestContext();
$context->fromRequest($request);

//
$matcher = new UrlMatcher($collection, $context);

try {
  $parameters = $matcher->match($request->server->get('PATH_INFO'));
} catch (ResourceNotFoundException $e) {
  echo $e->getMessage();
}

// Vamos verificar se existe o controlador
if (class_exists($parameters['controller'])) {
  $classe = $parameters['controller'];
  $controller = new $classe;
  call_user_func_array(array($controller, $parameters['method']), []);
}
