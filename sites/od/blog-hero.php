<?php

$directory = '/' .trim(__DIR__, 'sites/od');

// Is haas ontwerp, weird
if (strpos($directory, 'subsites/gc.haas-ontwerp.nl') !== false) {
  $directory = '/d' .trim(__DIR__, 'sites/od');
}

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

echo $twig->render('blog.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'hero' => 'conference-1.jpg',
  'extra_classes' => ' l-with-hero',
  'page_title' => 'Al meer dan 20 certificaten voor de online spelleider cursus',
  'author' => 'Ineke Graumans',
]);