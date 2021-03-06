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

echo $twig->render('blog.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'hero' => 'conference-1.jpg',
  'extra_classes' => ' l-with-hero',
  'page_title' => 'Al meer dan 20 certificaten voor de online spelleider cursus',
  'author' => 'Ineke Graumans',
]);