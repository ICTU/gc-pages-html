<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, ['debug' => TRUE]);

echo $twig->render('homepage.html.twig', [
  'site_name' => 'Beeldbank',
  'site_slogan' => 'Maak begrijpelijke brieven',
  'title' => 'Beeldbrieven, zó werkt het',
  'intro' => 'Hoe maak je een burgerbrief begrijpelijk?',
  'stappenplan' => 'true',
  'theme' => 'beeldbank'
]);