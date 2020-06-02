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

$title = 'Kom uit je ivoren toren';

$body = '<p>Kom uit je ivoren toren, ga naar gebruikers toe. Dat kan overal zijn: op de markt, het station, in het buurtcentrum, bij scholen of op congressen.</p>' .
  '<h2>Hoe krijg ik het voor elkaar?</h2>' .
  '<p>Naast face-to-face contact kan je je ook online onder burgers mengen, bijvoorbeeld door aan communities deel te nemen. Doe dit niet maar één keer, maar blijf dit doen. Haal voortdurend signalen op. Laat mensen meedenken. Zo houd je voeling met wat er bij je gebruikers leeft. Luister en leer.</p>';


$examples = [
  '1' => [
    'title' => 'Ga naar de mensen toe',
    'descr' => '<p>We hebben meerdere sessies in de stad georganiseerd met bewoners, ondernemers, van jong tot oud, man, vrouw, met allerlei achtergronden, met 40 á 50 man tegelijkertijd. Die hebben we de vraag gesteld: wat verwacht je nou van de gemeente met onlinedienstverlening? En hoe sta jij ten opzichte van de gemeente als je online iets regelt? Want als je een negatief gevoel hebt of had bij de gemeente, dan zit je’s avonds toch anders achter je computer.</p>',
    'author' => $authors['tino'],
  ],
  '2' => [
    'title' => 'Kom uit de ivoren torentjes. En niet maar één keer per maand',
    'descr' => '<p>Trek de wijk in, laat mensen meedenken over digitale communicatie en dienstverlening. En onderzoek ondertussen: wat zijn de behoeftes van de mensen?  En dat niet één keer in de maand: luister voortdurend, zodat je in kleine wekelijkse stapjes de dienstverlening kan verbeteren.  In de grote steden zou één iemand dat voortdurend kunnen organiseren. De ambtenaren moeten uit hun ivoren torentjes komen.</p>'.
      '<p> Ik doe het Mobile Media Lab, de mobiele onderzoeksruimte van de politie, ook niet in mijn eentje.  Ik zorg ervoor dat mensen bij de politie die normaal in een kantoor achter een computer zitten de straat opgaan. Dat zijn ieder keer andere mensen. De ene keer sta ik in Groningen en trek dan de mensen daar, die normaal gesproken bijvoorbeeld baliewerk doen, mee de straat op. Die zitten bijvoorbeeld de hele dag aangiftes op te nemen. Ik neem ze mee naar buiten, daar waar de mensen zijn, in hun eigen omgeving. Dan laat ik ze in de luisterstand gaan. Om bijvoorbeeld te horen hoe ze het opnemen van aangiftes kunnen verbeteren.',
    'author' => $authors['ed'],
  ],
  '3' => [
    'title' => 'Ga naar je doelgroep toe',
    'descr' => '<p>Ik was op een leuk congres van stichting ABC. Daar hadden we rond-de-tafel-sessies met laaggeletterden. Dat zou iedereen eens moeten doen. Je weet niet waar je moet beginnen als je hoort waar die mensen allemaal tegenaan lopen. Je kunt je bijna niet voorstellen wat een handicap het is als je moeilijk kunt lezen of schrijven. Praten over mensen met een visuele beperking is wat anders dan praten met iemand die bijvoorbeeld met een hulphond naar binnen komt. Dat is óók de burger die jouw salaris betaalt. Voor die burger is jouw tool óók bestemd.</p>',
    'author' => $authors['erwin'],
  ],
  '4' => [
    'title' => 'Voortdurend ophalen van signalen en deze inbrengen in de organisatie',
    'descr' => '<p>Ons DNA-team is voortdurend bezig met ‘klantsignaalmanagement’: het ophalen van signalen. Door gebruikersgesprekken, usabilitytesten, door in gesprek te gaan met een participatieraad, of bijvoorbeeld met belangengroepen van gehandicapten. We hebben ook wat we ‘de Gideonsbende’ noemen: een participatie instrument. Deze groep inwoners, ondernemers en ambtenaren komen eens in de twee maanden bij elkaar om over van alles en nog wat rondom dienstverlening van de gemeente te praten.  Dat brengen we dan weer terug in de organisatie, in de vorm van een ongevraagd, en soms een gevraagd advies. Daardoor merken we dat we langzaam de cultuuromslag realiseren die er nodig is. Wij werken eigenlijk als een soort ambassadeurs.</p>',
    'author' => $authors['erwin'],
  ],
];

$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Geen onderzoek',
      'nr' => '0',
      'descr' => 'gedaan',
    ],
  ]
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
  '<p>Deze tip heeft geen onderzoek, maar we willen toch dit blok zien</p>';
/*
 * Set related cards
 * */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Commitment');
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
  'category' => 'commitment',
  'links' => $links,
  'research' => $research,
  'related' => $related_cards,
  'sprite_url' => '/theme/img/sprites/optimaal-digitaal/defs/svg/sprite.defs.svg',
  'nr' => '78',
]);