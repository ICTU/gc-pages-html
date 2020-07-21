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


echo $twig->render('nlds-home.html.twig', [
  'site_name' => 'NL Design System',
  'title' => 'NL Design System',
  'intro' => 'Voor iedereen in Nederland die zich bezighoudt met (digitale) dienstverlening',
  'theme' => 'nlds',
  'logo' => 'img/logo/nlds.svg',
]);