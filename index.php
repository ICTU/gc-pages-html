<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader([__DIR__ . '/templates', __DIR__ .'/sites/od/templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);

echo $twig->render('homepage.html.twig', [
  'site_name' => 'Gebruiker Centraal',
  'title' => 'Een gebruiksvriendelijke overheid',
  'intro'=> 'Gebruiker Centraal is een community voor professionals die bezig zijn met de (online) dienstverlening van de overheid.',
  'type' => 'front'
]);


