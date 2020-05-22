<?php


$directory = '/' .trim(__DIR__, 'sites/od');

// Is haas ontwerp, weird
if (strpos($directory, 'subsites/gc.haas-ontwerp.nl') !== false) {
  $directory = '/d' .trim(__DIR__, 'sites/od');
}

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);


echo $twig->render('od-home.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Optimaal Digitaal',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
]);