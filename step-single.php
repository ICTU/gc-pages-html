<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;


$loader = new FilesystemLoader(__DIR__ . '/templates');

$filter = new TwigFilter('group', ['App/GroupByMonth', 'group']);

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);
$twig->addFilter($filter);


$intro = 'Ga in gesprek met alle (interne) belanghebbenden van de brief, folder of website die je wilt aanpakken – denk aan de proceseigenaar, communicatieadviseur, KCC’er, beleidsadviseur – over het idee van gebruik van beeldtaal.';

echo $twig->render('step-single.html.twig', [
  'site_name' => 'Beeldbank',
  'site_slogan' => 'Maak begrijpelijke brieven',
  'logo' => 'img/logo/beeldbank.svg',
  'title' => 'Stap 1: Bereid voor',
  'intro' => $intro,
  'theme' => 'beeldbank',
  'breadcrumb' => [
    'page_title' => 'Stap 1: Bereid voor',
    'links' => [
      'Zelf maken'
    ]
  ]
]);