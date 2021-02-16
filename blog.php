<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);

echo $twig->render('posts/blog.html.twig', [
  'site_name' => 'Gebruiker Centraal',
  'type' => 'post',
  'title' => 'Direct Duidelijk en een inclusief stembiljet bij de gemeente Enschede'
]);