<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;


use GcPages\Extensions\GroupBy;


$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

$filter = new TwigFilter('group', 'group');
$twig->addFilter($filter);


echo $twig->render('overview.html.twig', [
  'site_name' => 'Beeldbank',
  'site_slogan' => 'Maak begrijpelijke brieven',
  'logo' => 'img/logo/beeldbank.svg',
  'title' => 'Blog',
  'overview' => 'blogs',
  'modifier' => ' page--overview-archive',
  'theme' => 'beeldbank',
  'breadcrumb' => [
    'page_title' => 'Blogs',
    'links' => [
      'Home'
    ]
  ]
]);