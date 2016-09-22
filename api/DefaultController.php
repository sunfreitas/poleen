<?php

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
  function index(){
      echo 'Hello';
  }

  // GET /teste/create
  function create(){
    echo 'C from CRUD';
  }

  // GET /teste/{id}
  function read(){
    echo 'R from CRUD';
  }

  // PUT /teste
  function update(){
    echo 'U from CRUD';
  }

  function delete(){
    echo 'D from CRUD';
  }
}
