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


echo $twig->render('landing.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Het Optimaal Digitaal spel',
  'intro' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta.',
  'spotlight' => 'true',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
]);