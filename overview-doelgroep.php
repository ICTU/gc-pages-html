<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

$body =
  '<p>Ondanks het feit dat elk individu een unieke combinatie van vaardigheden en kenmerken heeft, is het toch mogelijk om mensen in te delen in doelgroepen. Elke doelgroep heeft een specifieke combinatie van kenmerken en vaardigheden. Vaardigheden kunnen uniek zijn voor de doelgroep, maar er is ook veel overlap tussen doelgroepen. Binnen doelgroepen bestaat tevens een een grote diversiteit aan kenmerken, de aard en het niveau van vaardigheden.</p>'.
  '<span class="source">Bronnen: Microsoft Inclusive Design, ICF.</span>';

echo $twig->render('overview.html.twig', [
  'site_name' => 'Gebruiker Centraal',
  'theme' => 'inclusie',
  'logo' => 'img/logo/inclusie.svg',
  'title' => 'Doelgroepen',
  'body' => $body,
  'overview' => 'doelgroep',
]);