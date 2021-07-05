<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);


echo $twig->render('overview.html.twig', [
  'site_name' => 'Beeldbank',
  'site_slogan' => 'Maak begrijpelijke brieven',
  'logo' => 'img/logo/beeldbank.svg',
  'theme' => 'beeldbank',
  'title' => 'Brieven',
  'body' => 'Hier vind je alle beeldbrieven.',
  'overview' => 'brieven',
]);