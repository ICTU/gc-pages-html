<?php

$directory = $_SERVER['DOCUMENT_ROOT'];

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\GroupByMonth;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);

$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new GroupByMonth);


echo $twig->render('od-overview-tips.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'title' => 'Alle tips',
  'overview' => 'tips',
  'modifier' => ' page--overview-archive',
  'breadcrumb' => [
    'page_title' => 'Alle tips',
    'links' => [
      'Home'
    ]
  ]
]);