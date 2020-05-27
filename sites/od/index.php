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


echo $twig->render('od-home.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Optimaal Digitaal',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
]);