<?php


$directory = $_SERVER['DOCUMENT_ROOT'];

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

$loader = new FilesystemLoader([
  $directory . '/templates',
  'data',
  'templates',
]);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);

// Cards ov

$data = file_get_contents("data/inclusie.json");
$cards = json_decode($data, true);


echo $twig->render('od-page.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'title' => 'Optimaal Digitaal Inclusieset',
  'theme' => 'od',
  'intro' => 'Hoe maak je je dienstverlening inclusief? De Inclusie uitbreidingsset helpt je met het in kaart brengen wat er nodig is voor een meer inclusieve dienstverlening.',
  'content' => 'set',
  'cards' => $cards,
  'logo' => 'img/logo/od.svg',
]);