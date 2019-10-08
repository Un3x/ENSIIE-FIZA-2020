<?php

$data = [
  [
    'author' => 'Beldelphine',
    'content' => 'Quel culot'
  ],
  [
    'author' => 'Jean Michel Chauvin',
    'content' => 'Vive la france, bande de cons'
  ]
];


include_once '../src/view/layout.php';
generateView('comment', $data);