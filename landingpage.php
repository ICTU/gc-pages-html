<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

echo $twig->render('landingpage.html.twig', [
  'site_name' =>'Gebruiker Centraal']
);