<?php

// Defining allowed type resources
$allowedResourceTypes = [
  'books',
  'authors',
  'genres'
];


// Defining resources: book
$books = [
  1 => [
      'title' => 'A Journey to the Center of the Earth',
      'author' => 145,
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  2 => [
      'title' => 'From the Earth to the Moon',
      'author' => 145,
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  3 => [
      'title' => 'Twenty Thousand Leagues Under the Sea',
      'author' => 145,
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
  4 => [
      'title' => 'The Mysterious Island',
      'author' => 145,
      'genre' => [
          'genreId' => 1,
          'genreName' => 'Science Fiction'
      ],
  ],
];

$authors =[
  145 => [
      'authorId' => 145,
      'athors' => 'Jules Verne',
  ],
];
