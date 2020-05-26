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

/*
 * Set up data for the tip
 */


$author_data = file_get_contents("data/authors.json");
$authors = json_decode($author_data, TRUE);

$title = 'Test met échte gebruikers';

$body = '<p>De gebruiker centraal zetten is het belangrijkste principe in goede dienstverlening (zie tip 21, 30, 31, 60, 57). Als je dit  nastreeft dan laat je de online dienst of het digitale product testen door echte gebruikers. ' .
  'Het klinkt heel logisch, maar gebeurt vaak niet. Er wordt vaak voor de gebruiker gedacht. Inzicht in usability, gebruiksvriendelijkheid, kan op veel verschillende manieren. </p>' .
  '<h2>Hoe krijg ik het voor elkaar?</h2>' .
  '<p>Nodig gebruikers uit, kijk mee als ze de dienst gebruiken, doe een usabilitytest, vraag wat ze er van vinden, maak een klantreis, analyseer data, leg het voor in een klantenpanel, of organiseer wasstraatsessies (zie tip 48, 40). Zolang je maar inventariseert waar het misgaat voor de gebruiker, waar de werkelijke behoeftes liggen en het beter kan.</p>';

$examples = [
  '1' => [
    'title' => 'Test apps bij de doelgroep',
    'descr' => '<p>Neem de DigiD app. Als je op dit moment kijkt naar de waardering in de Play Store dan is die heel laag. Er is iets gemaakt, waarschijnlijk zonder al te zeer te letten op de gebruikerservaring in den breedte, met de beste bedoelingen.' .
      'Maar de omvang van die app wordt door heel veel mensen die er in de Play Store op reageren als te groot ervaren. Makers bij de overheid moeten zich goed realiseren 1) dat de smartphone waar mensen over beschikken niet altijd de nieuwste Samsung Galaxy S8 is.' .
      'En 2) dat die smartphones vol staan met foto’s en filmpjes. </p>',
    'author' => $authors['wolfgang'] //wolfgang ebbers
  ],
  '2' => [
    'title' => 'Echte klanten betrekken bij verbetering digitale dienstverlening',
    'descr' => '<p>We maken klantreizen. Met echte gebruikers kijken we naar bepaalde producten en diensten of bepaalde kanalen. Stap voor stap naar waar gaat een klant doorheen: hoe ervaren ze dat, waar lopen ze tegenaan, hoe te verbeteren. Daarnaast doen we ook analyses op: hoe lopen klanten door het digitale proces, waar haken ze af.' .
      'Als we dat weten, kan je ook gericht kijken wat er gebeurt en hoe het beter kan. Daar halen wij veel winst. Onze ambitie is dat we dat blijven doen.</p>',
    'author' => $authors['elo'],
  ],
  '3' => [
    'title' => 'Focus op usability',
    'descr' => 'We hebben onlangs een aantal van onze diensten die al wat langer bestonden vernieuwd. We kijken hoe intensief gebruikers er mee bezig zijn, we proberen aan te sluiten bij het proces en we halen er een usability-expert bij. '.
      'Wij werken met werkgroepen, met een tiental bedrijven, die elk vanuit hun eigen segment naar het product kijken. Maar als de dienst af is en we zetten het in de markt, dan merken we toch dat er nog best veel te halen is door wat breder en op basis van echt gebruik usability snel te verbeteren. Ik denk dat een grote focus op usability, met name in de periode na livegang, dus bij de eerste introductie, belangrijk is. Houd daar ruimte om die usability steeds te optimaliseren. Zodat de acceptatie gewoon een stuk beter gaat.',
    'author' => $authors['iwan'],
  ],
  '4' => [
    'title' => 'Trek de wereld van je klant in',
    'descr' => '<p>Trek de wereld van de eindgebruiker je organisatie in. Of andersom: trek als bedrijf de wereld van je klant in. Niet éénmalig of incidenteel, maar structureel. Ga op ontdekkingsreis, bezoek klanten en observeer ze in hun dagelijkse doen. Zet échte gebruikers aan het werk met échte prototypes en observeer waar ze vastlopen. Laat je klanten in een vroeg stadium actief meedenken over welke dienstverlening écht relevant is. En zet de ‘eindklant’ aan de directietafel door het vertonen van video-opnames van usability tests.</p>',
    'link' => [
      'title' => 'Hoe moeilijk kan het zijn?',
      'modifier' => 'read-more',
    ],
    'author' => $authors['bob'],
  ],
];

$rblocks = [
  '1' => [
    'title'=> 'Onderzoeken',
    'nr' => 'Geen',
    'descr' => 'gedaan voor deze tip'
  ],
  '2' => [
    'title'=> 'Onderzoeksblok',
    'nr' => '2000',
    'descr' => 'doorgegeven'
  ]
];

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Gebruiksgemak');
});

$related_cards = array_slice($cards_by_theme, 3);


echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'title' => $title,
  'body' => $body,
  'examples' => $examples,
  'category' => 'gebruiksgemak',
  'rblocks' => $rblocks,
  'related' => $related_cards,
  'sprite_url' => '/theme/img/sprites/optimaal-digitaal/defs/svg/sprite.defs.svg',
  'nr' => '78',
]);