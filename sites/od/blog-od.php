<?php


$directory = '/' .trim(__DIR__, 'sites/od');

// Is haas ontwerp, weird
if (strpos($directory, 'subsites/gc.haas-ontwerp.nl') !== false) {
  $directory = '/d' .trim(__DIR__, 'sites/od');
}

require  $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$filter = new TwigFilter('group', 'group');
$twig->addFilter($filter);


echo $twig->render('overview.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Blogs',
  'overview' => 'blogs',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
]);