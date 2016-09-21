<?php
  /**
   * http://php.net/manual/en/reserved.variables.server.php
   * @todo As rotas iniciam aqui. Talvez criar um Router para lidar com as
   * requisições.
   */
  $uri = $_SERVER['REQUEST_URI'];

  $uri = explode("/", $uri);

  // retira o primeiro elemento (array vazio do )
  array_shift($uri);

  // controller a ser instanciado.
  $controller = $uri[1];
  array_shift($uri);

  $params = $uri;

  // Basic restful routes
  // Vamos malhar em cima das expressões regulares
  $routes = [
    "/" => "index",
    "/{id}" => "read",
    "/" => "create"
  ];

  /**
   * @todo criar uma facoty de controllers
   * @todo controllers devem herdade de Controller
   * @todo Controller implementa IController
   */
  class Teste{
    var $posts = [
      [
        "name" => "John Doe",
        "email" => "me@doe.com"
      ],
      [
        "name" => "Mariah",
        "email" => "me@mariah.com"
      ]
    ];

    // GET /teste
    function index(){
        echo 'Hello';
    }

    // GET /teste/create
    function create(){
      echo 'C from CRUD';
    }

    // POST /teste
    function store(){
      echo 'store';
    }

    // GET /teste/{id}
    function read(){
      echo 'R from CRUD';
    }

    // GET /teste/{id}/edit
    function edit(){
      echo 'create';
    }

    // PUT /teste
    function update(){
      echo 'U from CRUD';
    }

    function delete(){
      echo 'D from CRUD';
    }

    function users(){
      echo json_encode($this->posts);
    }
  }

  if (class_exists($controller)) {

    // Instancia a classe.
    $teste = new $controller();

    if (method_exists($teste, $params[1])) {
      call_user_func_array(array($teste, $params[1]), []);
    }
    else{
      echo "Método não encontrado";
    }

  }else{
    echo 'Classe não declarada';
  }
