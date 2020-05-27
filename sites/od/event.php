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

echo $twig->render('event.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'page_title' => 'Dit is echt een super, mega ongefofelijk lange titel met superveel woorden en letters en spaties zodat je kan zien wat er met de uitlijning gebeurd als je dus echt een hele lange titel hebt.',
]);