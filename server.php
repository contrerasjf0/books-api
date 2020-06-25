<?php

require_once('./data.php');

//Access Tokens Authentication

if ( !array_key_exists( 'HTTP_X_TOKEN', $_SERVER ) ) {

  die;
}

$url = 'https://localhost:8001/';

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
  "X-Token: {$_SERVER['HTTP_X_TOKEN']}",
]);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$ret = curl_exec( $ch );

if ( curl_errno($ch) != 0 ) {
  die ( curl_error($ch) );
}

if ( $ret !== 'true' ) {
  http_response_code( 403 );
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
