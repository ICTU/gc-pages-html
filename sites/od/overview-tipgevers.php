<?php

$directory = $_SERVER['DOCUMENT_ROOT'];

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);

$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);

$author_data = file_get_contents("data/authors.json");
$authors = json_decode($author_data, TRUE);

echo $twig->render('overview.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'title' => 'Tipgevers',
  'body' => 'Wie hebben al deze tips gegeven?',
  'overview' => 'tipgevers',
  'items' => $authors,
  'breadcrumb' => [
    'page_title' => 'Tipgevers',
    'links' => [
      '1' => [
        'url' => 'index.php',
        'title'=> 'Home'
      ]
    ]
  ]
]);

