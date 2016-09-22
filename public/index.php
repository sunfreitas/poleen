<?php
include('../api/DefaultController.php');
  /**
   * http://php.net/manual/en/reserved.variables.server.php
   * @todo As rotas iniciam aqui. Talvez criar um Router para lidar com as
   * requisições.
   */
  $uri = $_SERVER['REQUEST_URI'];

  $uri = explode("/", $uri);

  array_shift($uri);

  $controller = $uri[2];

  $params = $uri;

  // Basic restful routes
  // Vamos malhar em cima das expressões regulares
  $routes = [
    "/" => "index",
    "/{id}" => "read",
    "/" => "create"
  ];

  if (class_exists($controller)) {

    // Instancia a classe.
    $ctrl = new $controller();

    if (method_exists($ctrl, $params[3])) {
      call_user_func_array(array($ctrl, $params[3]), []);
    }
    else{
      echo "Método não encontrado";
    }

  }else{
    echo 'Classe não declarada';
  }
