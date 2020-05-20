<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;


$loader = new FilesystemLoader(__DIR__ . '/templates');

$filter = new TwigFilter('group', ['App/GroupByMonth', 'group']);

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);
$twig->addFilter($filter);


echo $twig->render('overview.html.twig', [
  'site_name' =>'Gebruiker Centraal']
);