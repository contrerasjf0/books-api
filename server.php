<?php

// Defining allowed type resources
$allowedResourceTypes = [
  'books',
  'authors',
  'genres'
];


// Validating the availability of the resource
$resourceType = $_GET['resource_type'];

// in_array() funcion verifies that an element belongs to the array
if(! in_array($resourceType, $allowedResourceTypes)){
  die;
}


// Generating the response asumming that the request is correct
switch (strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case'GET':
      
  break;

  case'POST':
  break;

  case'PUT':   
  break;

  case'DELETE':
  break;                        
}