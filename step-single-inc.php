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

$body =
  '<ol class="steplist">'.
  '<li><h2>Stel een kernteam samen</h2>' .
  '<p>Stel een kernteam samen. Betrek in het kernteam de eigenaar, inhoudsdeskundige en/of iemand die daadwerkelijk met de brief, folder of website moet werken. Daarnaast is het raadzaam – mits relevant – ook een jurist en iemand van ICT aan het team toe te voegen, zodat je daarmee snel kan afstemmen.</p></li><li>
<h2>Formuleer met je kernteam het doel</h2>
<p>Wat wil je met de nieuwe beeldproduct bereiken? Maak altijd duidelijk wat je van de ontvanger wil. Oók als die niets hoeft te doen.</p></li>
<li>
<h2>Neem met je kernteam het eerdere product door</h2>
<p>Wat kan er allemaal uit aan tekst en beelden, wat móet er blijven staan? Welke onderdelen lenen zich voor beeldtaal?</p></li>
</ol>';


echo $twig->render('step-single.html.twig', [
  'site_name' => 'Beeldbank',
  'site_slogan' => 'Maak begrijpelijke brieven',
  'logo' => 'img/logo/beeldbank.svg',
  'title' => 'Stap 1: Bereid voor',
  'intro' => $intro,
  'body' => $body,
  'theme' => 'beeldbank',
  'breadcrumb' => [
    'page_title' => 'Stap 1: Bereid voor',
    'links' => [
      'Zelf maken'
    ]
  ]
]);