<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use App\Twig\GroupByMonth;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);

// Add filter for event grouping
$twig->addExtension(new GroupByMonth);

echo $twig->render('overview.html.twig', [
  'title' => 'Evenementen',
  'body' => 'We organiseren veel evenementen door het hele land.',
  'overview' => 'events',
  'modifier' => ' page--overview-archive',
  'breadcrumb' => [
    'page_title' => 'Evenementen',
    'links' => [
      'Home'
    ]
  ]
]);