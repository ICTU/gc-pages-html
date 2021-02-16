<?php


$directory = $_SERVER['DOCUMENT_ROOT'];

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;
use App\Twig\GroupByMonth;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);
$twig->addExtension(new GroupByMonth);


echo $twig->render('inc-home.html.twig', [
  'site_name' => 'Inclusie',
  'site_slogan' => 'Ontwerp voor iedereen',
  'title' => 'Inclusie',
  'theme' => 'inclusie',
  'logo' => 'img/logo/inclusie.svg',
]);