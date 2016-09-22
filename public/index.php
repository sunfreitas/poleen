<?php
include('../vendor/autoload.php');

$uri = $_SERVER['REQUEST_URI'];

$uri = explode("/", $uri);
array_shift($uri);

$controller = 'Api\\' . $uri[2];
$params = $uri;

$ctrl = new $controller();

if (method_exists($ctrl, $params[3])) {
  call_user_func_array(array($ctrl, $params[3]), []);
}
else{
  echo "Método não encontrado";
}
