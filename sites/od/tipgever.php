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


$title = 'Gebruiker Centraal Auteur';

$breadcrumb['links'] = [
  '1' => [
    'url' => 'index.php',
    'title' => 'Home',
  ],
  '2' => [
    'url' => 'overview-tipgevers.php',
    'title' => 'Tipgevers',
  ],
];

// Set data
$cards = file_get_contents("data/cards.json");
$cards_data = json_decode($cards, TRUE);

// Set up data for overview
shuffle($cards_data);
$data = array_slice($cards_data, 0, 8);


echo $twig->render('author.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'title' => $title,
  'breadcrumb' => $breadcrumb,
  'data' => $data,
  'logo' => 'img/logo/od.svg',
]);