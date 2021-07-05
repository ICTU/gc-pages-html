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


$title = 'Voor spelleiders';


$intro = 'Wil je het Optimaal Digitaal spel spelen met je team om een concreet en ‘echt’ doel aan te pakken? Je kunt zelf spelleider zijn, of iemand anders uit je organisatie. Oók zonder de spelleider cursus te hebben gedaan.';


$spotlight = [
  '1' => [
    'title' => 'Word ook een spelleider!',
    'descr' => 'In een Spelleider sessie maak je als deelnemer kennis met het spel en leer je ondertussen de do’s en don’ts in de rol van spelleider. We gaan vol overgave twee uur aan de slag met het spel.',
    'img' => 'img-16-9-od.jpg',
    'cta' => [
      '1'=> [
        'title'=> 'Schrijf je in',
        'url' => 'word-spelleider.php'
      ]
    ]
  ],
];


echo $twig->render('landing.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'page' => 'spelleider',
  'title' => $title,
  'intro' => $intro,
  'spotlight' => $spotlight,
  'logo' => 'img/logo/od.svg',
]);