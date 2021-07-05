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

$title = 'Maak je aanpak inclusief';

$body = '<p>Besteed in het hele proces structureel aandacht aan inclusie. Maak gebruik van ontwerprichtlijnen, betrek gebruikers en kijk naar goede voorbeelden. Evalueer steeds, leer en verbeter.</p>';

$examples = [
  '1' => [
    'title' => 'Voorbeeld voorbeeld',
    'descr' => '<p>Inclusie heeft momenteel nog geen tips dus bij deze lorem ipsem. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>',
  ],
];

$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Gemeenten',
      'nr' => '20%',
      'descr' => 'voldoende inclusief',
    ],
    '2' => [
      'title' => 'Inwoners',
      'nr' => '>18%',
      'descr' => 'heeft een beperking',
    ],
  ],
  'conclusion' => '<p>Er valt nog wel wat te verbeteren op een inlcusieve aanpak van de gemeenten.</p>',
];


/*
 * Set Links
 */

$links = [
  '1' => [
    'title' => 'Inclusie bij Gebruiker Centraal',
    'descr' => 'Samen met TNO ontwikkelde Gebruiker Centraal de Inclusieset. Alles over inclusie vind je op de website.',
    ],
];

$downloads = '';
$why = 'Optimalisatie van de eigen middelen heeft weinig zin als eindgebruikers er niet komen. Juist door aandacht te geven aan de toeleiding naar informatie en product. Dienstverlening moet aansluiten bij de behoeftes en gewoontes van de eindgebruiker, zodat het ook echt gebruikt gaat worden.';

$research['text'] =
  '<p>Ik heb ook geen onderzoek kunnen vinden van een inclusietipkaart maar áls het er is ziet het er zo uit.</p>' .
  '<hr>' .
  '<cite>Bron: <a href="#">Optimaal Digitaal</a></cite>';

/*
 * Set related cards
 * */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Inclusie');
});

$related_cards = array_slice($cards_by_theme, 0, 4);

echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'category' => 'inclusie',
  'title' => $title,
  'body' => $body,
  'examples' => $examples,
  'why' => $why,
  'research' => $research,
  'rblocks' => $rblocks,
  'links' => $links,
  'downloads' => $downloads,
  'related' => $related_cards,
  'sprite_url' => '/theme/img/sprites/optimaal-digitaal/defs/svg/sprite.defs.svg',
  'nr' => '100',
]);