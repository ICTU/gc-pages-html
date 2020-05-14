<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

echo $twig->render('blog.html.twig', [
  'site_name' => 'Gebruiker Centraal',
  'hero' => 'conference-1.jpg',
  'extra_classes' => ' l-with-hero',
  'page_title' => 'Recapping the International Design in Government Conference 2019',
  'author' => 'Elka Helmers',
]);