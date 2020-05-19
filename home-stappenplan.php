<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, ['debug' => TRUE]);

echo $twig->render('homepage.html.twig', [
  'site_name' => 'Inclusie',
  'site_slogan' => 'Ontwerpen voor iedereen',
  'title' => 'Homepage met stappenplan',
  'stappenplan' => 'true',
  'theme' => 'inclusie',
  'logo' => 'img/logo/inclusie.svg',
]);