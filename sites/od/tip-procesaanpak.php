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

$title = 'Laat je leiden door data';

$body = '<p>Ontwikkel op basis van data. Baseer beslissingen over de inrichting van je dienstverlening op feitelijke constateringen, niet op wat je denkt dat goed is. Dat geldt zowel voor de ontwerpfase als de doorontwikkeling. Monitor wat er gebeurt op je kanalen en blijf dit doen. Laat innovaties testen door gebruikers en onderzoek wat hun wensen zijn. Data gaat niet alleen over cijfers, maar ook over kijken en luisteren naar gebruikers. Verzamel dus zowel kwantitatieve als kwalitatieve data voor een zo compleet mogelijk begrip van de gebruiker en van zijn ervaring met je dienstverlening.</p>';
$examples = [
  '1' => [
    'title' => 'Laten leiden door data',
    'descr' => '<p>We werken ‘evidence based’ en ‘data driven’. We hebben het ‘toptakenprincipe’ gehanteerd. Op basis van analyse van de frontoffices hebben we de meest gestelde vragen van de grootste groep klanten in kaart gebracht. Die brengen we in beeld op onze website. Dat blijven we monitoren en kunnen we ook aanpassen. Bij ‘de meest gestelde vragen’ zie je de vragen die het nu niet gered hebben tot toptaak.</p>',
    'author' => $authors['tino'],
  ],
  '2' => [
    'title' => 'Toptaken op basis van data gedreven klantanalyse',
    'descr' => '<p>Ondanks dat we nog lang niet zo ver zijn dat we het perfect uitvoeren, hebben we het uitgangspunt dat we ons steeds meer laten leiden op basis van data. We stoppen veel tijd in het ontsluiten van klantdata, zodat we één totaalbeeld van de klant krijgen. Dan bedoel ik niet alleen een integraal klantbeeld, zoals dat steeds vaker wordt genoemd in de overheidswereld. Dat houdt in dat je de status van een aanvraagproces of klantvraag op elk kanaal kan laten zien. Dat is niet voldoende. We zijn ook op een iets hoger abstractieniveau gaan kijken naar gebruikerspatronen. Welke kanalen gebruiken we nu en waar zijn gebruikers het meest tevreden over, waar komt de meeste feedback op, wat zijn de specifieke vragen aan de telefoon, welke vragen worden per life event gesteld? </p>' .
      '<a href="#" class="btn btn--read-more">Website CAK</a>',
    'author' => $authors['menno'],
  ],
  '3' => [
    'title' => 'Kijken naar wat er op de website gebeurt',
    'descr' => '<p>Het monitoren is ook een onderdeel van het verbeteren van de dienstverlening. Het verschilt sterk per organisatie hoe dat is ingeregeld. En hoe dat wordt gebruikt. Als je echt serieus aan de slag wil met de vraag of je de aangiftebereidheid hebt verhoogd of hoe de gebruikerservaring op je website is, dan moet je monitoren. Bij gebruikersgericht maken hoort ook dat je het gebruikersgericht houdt. Dat je het daar waar het relevant is vriendelijk houdt door voortdurend te monitoren. En te verbeteren. Je kunt dat op veel verschillende manieren meten, maar voor een deel is het gewoon kijken naar wat er op je website gebeurt.</p>',
    'author' => $authors['wolfgang'],
  ],
  '4' => [
    'title' => 'Onderbouw met cijfers',
    'descr' => '<p>Cijfers kunnen veel zeggen. Ga niet alleen op gevoel af. Het helpt als je ook kan aantonen dat het iets kan opleveren. Ondersteun zo mogelijk met cijfers. Stel dan wel vantevoren duidelijke kernprestatie-indicatoren op.</p>',
    'author' => $authors['herman'],
  ],
];

$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Verhuizingen',
      'nr' => '2000',
      'descr' => 'doorgegeven',
    ],
    '2' => [
      'title' => 'Succesratio',
      'nr' => '25%',
      'descr' => 'resultaat',
    ],
    '3' => [
      'title' => 'Hoogste succesratio',
      'nr' => '48%',
      'descr' => 'van gemeente Y',
    ],
  ],
  'conclusion' => '<p>Als je 1) weet hoe groot het aandeel is dat de digitale route afrondt en 2) weet hoe groot dat in potentie zou kunnen zijn – bij anderen is het aandeel immers hoger – dan kan je aan de slag op basis van feiten.</p>'
];

/*
 * Set Links
 */

$links = [
  '1' => [
    'title' => 'Design with Data',
    'descr' => 'Ontwerp op basis van data is een van de ontwerpprincipes van Gov.uk',
  ],
  '2' => [
    'title' => 'Gebruiker Centraal ontwerpprincipes',
    'descr' => 'Ga uit van feiten, niet van aannames',
  ],
  '3' => [
    'title' => '6 mythes over Data Driven Design',
    'descr' => 'Om beter te begrijpen wat data gedreven inhoudt: op UXMagazine wordt op een rijtje gezet wat het NIET is (Artikel in het Engels).',
  ],
];

$research['text'] =
  '<p>In opdracht van het ministerie van Binnenlandse Zaken en Koninkrijksrelaties (BZK), Economische Zaken (EZ) en het programma Aan de slag met de Omgevingswet is bij 38 gemeenten het digitale gebruik van acht veelgebruikte producten in kaart gebracht. Elke gemeente ontvangt een rapport met de eigen resultaten èn een benchmark van alle deelnemers.</p>' .
  '<p>Een voorbeeld van de resultaten van een gemeente X:</p>' .
  '<p>25% van de bezoekers van de informatiepagina in gemeente X rondt het doorgeven van de verhuizing digitaal af (dat wil overigens niet zeggen dat 75% daar niet in zijn geslaagd: mensen kunnen bijvoorbeeld alleen informatie hebben gezocht en naar tevredenheid gevonden).' .
  'Gemeente Y heeft de hoogste score: 48%. Het zou dus in potentie mogelijk kunnen zijn dat gemeente X ook een score van 48% zou kunnen behalen. Of dat werkelijk binnen bereik ligt vergt verder onderzoek.</p>';

$research['source'] = '<p>Bron: <a href="#">Onderzoek naar het gebruik van digitale producten en diensten bij 38 gemeenten</a> (PDF – 1,4 Mb)</p>';


/*
 * Set related cards
 * */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Procesaanpak');
});

$related_cards = array_slice($cards_by_theme, 0, 4);

echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'title' => $title,
  'body' => $body,
  'examples' => $examples,
  'category' => 'procesaanpak',
  'links' => $links,
  'rblocks' => $rblocks,
  'related' => $related_cards,
  'sprite_url' => '/theme/img/sprites/optimaal-digitaal/defs/svg/sprite.defs.svg',
  'nr' => '78',
]);