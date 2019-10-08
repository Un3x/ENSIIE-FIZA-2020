<?php
$data = [
  [
    'author' => 'Picasso',
    'img' => 'http://static1.squarespace.com/static/58faa30ee6f2e151cda11af0/58fba15486e6c0f3d27362ef/5d6bdabd35affe0001f69f7c/1567372842816/2019-inktober-prompt-list.png?format=1500w',
    'content' =>"Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.",
    'date' =>'2019-10-03T17:00:13',
    'likes' => 678,
    'liked' => true
  ],
  [
    'author' => 'Young grumpy cat',
    'img' => 'https://timedotcom.files.wordpress.com/2019/03/kitten-report.jpg',
    'content' =>"Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.",
    'date' =>'2019-10-07T12:43:13',
    'likes' => 2345,
    'liked' => false
  ],
  [
    'author' => 'Jean Michel Chauvin',
    'img' => 'https://images-na.ssl-images-amazon.com/images/I/21EAOCdUbKL._SX355_.jpg',
    'content' =>"Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.",
    'date' =>'2019-10-03T17:00:13',
    'likes' => 678,
    'liked' => true
  ],
  [
    'author' => 'Otaku-chan',
    'img' => 'https://static.tvtropes.org/pmwiki/pub/images/otaku3.jpg',
    'content' =>"Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.",
    'date' =>'2019-10-03T17:00:13',
    'likes' => 678,
    'liked' => true
  ],
  [
    'author' => 'Beldelphine',
    'img' => 'https://cdn3-www.gamerevolution.com/assets/uploads/2019/10/belle-delphine.jpg',
    'content' =>"Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends.",
    'date' =>'2019-10-03T17:00:13',
    'likes' => 678,
    'liked' => true
  ]
];

include_once '../src/view/layout.php';
generateView('feed', $data);