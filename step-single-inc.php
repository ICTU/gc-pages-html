<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;


$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);


$intro = 'Identificeer gezamenlijk op welke manier je aandacht gaat besteden aan inclusie in je project en wat je wilt bereiken. Neem dit op in je projectplan.';

echo $twig->render('step-single.html.twig', [
  'site_name' => 'Inclusie',
  'site_slogan' => 'Ontwerp voor iedereen',
  'logo' => 'img/logo/inclusie.svg',
  'title' => 'Stap 1: Identificeer Inclusive Design doelen',
  'intro' => $intro,
  'theme' => 'inclusie',
  'breadcrumb' => [
    'page_title' => 'Stap 1: Identificeer Inclusive Design doelen',
    'links' => [
      'Zelf maken'
    ]
  ]
]);