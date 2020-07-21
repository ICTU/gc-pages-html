<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader([__DIR__ . '/templates', __DIR__ .'/sites/od/templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

echo $twig->render('homepage.html.twig', [
  'site_name' => 'Gebruiker Centraal',
  'title' => 'Dit is de homepage :D',
]);


