<?php


$directory = $_SERVER['DOCUMENT_ROOT'];

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);

$title = 'Wat is het?';

$breadcrumb = [
  'page_title' => $title,
  'links' => [
    '1' => [
      'url'=> 'index.php',
      'title'=> 'Home'
    ]
  ]
];

echo $twig->render('nlds-wat-is-het.html.twig', [
  'site_name' => 'NL Design System',
  'title' => 'Wat is het?',
  'intro' => 'Voor iedereen in Nederland die zich bezighoudt met (digitale) dienstverlening',
  'theme' => 'nlds',
  'logo' => 'img/logo/nlds.svg',
  'breadcrumb' => $breadcrumb
]);