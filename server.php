<?php

require_once('./data.php');

//HTTP Authentication 
$user = array_key_exists('PHP_AUTH_USER', $_SERVER ) ?  $_SERVER['PHP_AUTH_USER'] : '';
$pass = array_key_exists('PHP_AUTH_PW', $_SERVER ) ?  $_SERVER['PHP_AUTH_PW'] : '';

if ( $user !== 'mauro' || $pwd !== '1234' ) {
 die;
} 
// Validating the availability of the resource
$resourceType = $_GET['resource_type'];

// in_array() funcion verifies that an element belongs to the array
if(! in_array($resourceType, $allowedResourceTypes)){
  die;
}



header('Content-Type: application/json');

$resourceId = array_key_exists('resource_id',$_GET) ? $_GET['resource_id'] : '' ;

// Generating the response asumming that the request is correct
switch (strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case'GET':
    switch($resourceType){
        case 'books':
            if(empty($resourceId)){
                echo json_encode($books);
            }else{
                if(array_key_exists($resourceId, $books)){
                    echo json_encode($books[$resourceId]);
                }
            }
        break;
        case 'authors':
            if(empty($resourceId)){
                echo json_encode($authors);
            }else{
                if(array_key_exists($resourceId, $authors)){
                    echo json_encode($authors[$resourceId]);
                }
            }
        break;
    }
  break;

  case'POST':
    $json = file_get_contents('php://input');
    $books[] = json_decode($json, true);
    
    //echo json_encode($books);

    echo array_keys( $books )[count($books) -1];
  break;

  case'PUT':
    
    if (!empty($resourceId) && array_key_exists($resourceId, $books)){
      
        $json = file_get_contents('php://input');

        $books[$resourceId] = json_decode($json, true);
        
        //echo json_encode($books);
        echo json_encode([$resourceId]);
    }
  break;

  case'DELETE':

    if (!empty($resourceId) && array_key_exists($resourceId, $books)){
        
        unset( $books[ $resourceId]);    
        
        //echo json_encode($books);      
        json_encode([$resourceId]);
    }
  break;                        
}
