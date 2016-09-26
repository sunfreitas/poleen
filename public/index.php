<?php
include('../vendor/autoload.php');
$collection = include('../routes/api.php');
// Defining routes;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
// use Symfony\Component\Config\FileLocator;
// use Symfony\Component\Routing\Loader\PhpFileLoader;

use Symfony\Component\HttpFoundation\Request;

// Agora eu carrego os arquivos de rotas aqui.
// $locator = new FileLocator(array(__DIR__.'/routes'));
// $loader = new PHPFileLoader($locator);
// $collection = $loader->load('api.php');

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
  $parameters = $matcher->match('/home');
  var_dump($parameters);
} catch (ResourceNotFoundException $e) {
  echo $e->getMessage();
}
