<?php

//http://domain.com/?resource_type=book&resource_id=145
// to
//http://domain.com/book/145
$matches = [];

if (preg_match('/\/([^\/]+)\/([^\/]+)/', $_SERVER["REQUEST_URI"], $matches)) {
    $_GET['resource_type'] = $matches[1];
    $_GET['resource_id'] = $matches[2];

    error_log( print_r($matches, 1) );
    require 'server.php';
} elseif ( preg_match('/\/([^\/]+)\/?/', $_SERVER["REQUEST_URI"], $matches) ) {
    $_GET['resource_type'] = $matches[1];
    error_log( print_r($matches, 1) );

    require 'server.php';
} else {

    error_log('No matches');
    http_response_code( 404 );
}
