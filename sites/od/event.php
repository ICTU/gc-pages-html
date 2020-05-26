<?php

$directory = '/' . trim(__DIR__, 'sites/od');

// Is haas ontwerp, weird
if (strpos($directory, 'subsites/gc.haas-ontwerp.nl') !== FALSE) {
  $directory = '/d' . trim(__DIR__, 'sites/od');
}

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

echo $twig->render('event.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'page_title' => 'Dit is echt een super, mega ongefofelijk lange titel met superveel woorden en letters en spaties zodat je kan zien wat er met de uitlijning gebeurd als je dus echt een hele lange titel hebt.',
]);