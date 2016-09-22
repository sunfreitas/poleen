<?php

namespace Api;

class DefaultController{
  var $sample = [
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
  public function index(){
      echo 'Hello';
  }

  // GET /teste/create
  public function create(){
    echo 'C from CRUD';
  }

  // GET /teste/{id}
  public function read(){
    echo 'R from CRUD';
  }

  // PUT /teste
  public function update(){
    echo 'U from CRUD';
  }

  public function delete(){
    echo 'D from CRUD';
  }
}
