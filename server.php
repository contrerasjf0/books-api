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

// Defining resources: book
$books = [
  1 => [
      'title' => 'A Journey to the Center of the Earth',
      'author' => [
          'authorId' => 145,
          'authorName' => 'Jules Verne'
      ],
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  2 => [
      'title' => 'From the Earth to the Moon',
      'author' => [
          'authorId' => 145,
          'authorName' => 'Jules Verne'
      ],
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  3 => [
      'title' => 'Twenty Thousand Leagues Under the Sea',
      'author' => [
          'authorId' => 145,
          'authorName' => 'Jules Verne'
      ],
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  4 => [
      'title' => 'The Mysterious Island',
      'author' => [
          'authorId' => 145,
          'authorName' => 'Jules Verne'
      ],
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
];

header('Content-Type: application/json');

// Generating the response asumming that the request is correct
switch (strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case'GET':
      echo json_encode($books);
  break;

  case'POST':
  break;

  case'PUT':   
  break;

  case'DELETE':
  break;                        
}
