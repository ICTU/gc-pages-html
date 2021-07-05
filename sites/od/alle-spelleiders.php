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


$title = 'Alle spelleiders';


$intro = 'Door een Train-de-trainer Spelleider sessie te volgen kan je officieel spelleider Optimaal Digitaal worden.';

$breadcrumb = [
  'page_title' => 'Alle spelleiders',
  'links' => [
    '1' => [
      'url' => 'index.php',
      'title' => 'Home',
    ],
    '2' => [
      'url' => 'spelleiders.php',
      'title' => 'Voor spelleiders',
    ],
  ],
];

echo $twig->render('od-spelleiders.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'page' => 'spelleider',
  'page_title' => $title,
  'intro' => $intro,
  'breadcrumb' => $breadcrumb,
  'logo' => 'img/logo/od.svg',
]);