<?php

$directory = $_SERVER['DOCUMENT_ROOT'];

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);


// Set data
$cards_data = file_get_contents("data/cards.json");


echo $twig->render('od-overview-tips.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'title' => 'Alle tips',
  'overview' => 'tips',
  'modifier' => ' page--overview-archive',
  'tipkaarts' => json_decode($cards_data, TRUE),
  'type' => 'overview',
  'breadcrumb' => [
    'page_title' => 'Alle tips',
    'links' => [
      '1' => [
        'url' => 'index.php',
        'title' => 'Home',
      ],
      '2' => [
        'url' => 'tips.php',
        'title' => 'Tips',
      ],
    ],
  ],
]);