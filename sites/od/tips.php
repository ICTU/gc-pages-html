<?php


$directory = $_SERVER['DOCUMENT_ROOT'];

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);


echo $twig->render('od-tips.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Tips',
  'intro' => 'Optimaal Digitaal is een kennisbank met meer dan 100 tips uit het bedrijsleven. De tips zijn gebaseerd op ervaring en kennis van collega’s, van bedrijven en op onderzoek. De centrale gedachte achter alle tips blijkt: zet de gebruiker centraal.',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'breadcrumb' => [
    'links' => ['Home']
  ]
]);