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

$title = 'Uniformiseer en standaardiseer!';

$body =
  '<p>Burgers zijn gebaat bij standaardisering. Bedrijven nog meer, omdat zij vaak te maken hebben met verschillende overheidsinstanties. Uniformiteit, waar mogelijk, maakt processen duidelijker en efficiënter. Ook voor je eigen organisatie. Als bedrijven bij overheidsinstanties dezelfde formulieren of procedures tegenkomen, zullen ze minder vaak bellen.</p>' .
  '<h2>Hoe krijg ik het voor elkaar?</h2>' .
  '<p>Gebruik dezelfde symbolen en formuleringen in teksten, zodat er geen verwarring ontstaat. Kijk eerst of er standaarden zijn, voordat je zelf gaat ontwikkelen (zie ook tip 45). Of werk samen (tip 28 en tip 55) aan de ontwikkeling van een standaard en stel die ter beschikking.</p>';


$examples = [
  '1' => [
    'title' => 'Je zal maar burger wezen! Of ondernemer!',
    'descr' => '<p>Wat ze allemaal over je heen gooien aan voorzieningen, waar je iets mee moet! Waar totaal geen samenhang in zit. De boodschap naar de ministeries is: breng al je voorzieningen in samenhang vanuit het gebruikersperspectief. Niet alleen technisch, maar ook in de merknamen, zodat het klopt voor de eindgebruiker. e-Signature, e-facturering, e-ID, dat zijn termen die begrijp ik. Want dat benoemt verschillende functionaliteiten in een merk. Maar zodra het ene e-Herkenning heet en het andere DigiD, twee Berichtenboxen, of Ondernemersdossier, Ondernemersplein, SBR… Ja hallo, dan ben ik het helemaal kwijt. Met MijnOverheid voor Ondernemers brengt EZ lijn in wat je als ondernemer aan voorzieningen nodig hebt om digitaal zaken te kunnen doen. Heel mooi! Maak het uniform. Want je zal maar burger wezen, of ondernemer... Of allebe...</p>',
    'author' => $authors['roy'],
  ],
  '2' => [
    'title' => 'Uniformeer content',
    'descr' => '<p>Uniformeer je content met organisaties die op hetzelfde moment met diezelfde burger moeten communiceren of dingen moeten regelen. Ik denk dat daar een belangrijke verbetermogelijkheid zit voor de overheid als geheel. Daar is de Manifestgroep nu mee bezig rond life events. De content die wij aanleveren, eventueel in de look &feel van een andere organisatie, kan zo op andere sites worden gepubliceerd. We doen dit al bij de life event ‘er is iemand overleden’. Dat kan heel complex zijn voor mensen die daar mee te maken krijgen, ook in de relatie tot de overheid. Uit onderzoek weten we dat mensen enorm behoefte hebben aan de zekerheid, nabestaanden in dit geval, of ze nu alles goed geregeld hebben.</p>',
    'author' => $authors['luc'],
  ],
  '3' => [
    'title' => 'Meer harmoniseren',
    'descr' => '<p>De burger kan het helemaal geen bal schelen, voor hen is het allemaal overheid. De burger wil het liefst op één manier eenduidig worden geholpen. Bij de ene website moet hij op een vraagteken drukken, bij de volgende op ‘vraag & antwoord’ klikken en bij de derde staat er een poppetje. Dat is natuurlijk niet uit te leggen. Mijn idee is: kunnen we dat niet een beetje harmoniseren met elkaar?</p>',
    'author' => $authors['erwin'],
  ],
  '4' => [
    'title' => 'Uniformeren en standaardiseren',
    'descr' => '<p>Als je werkelijk de klant centraal stelt, dan heb je standaarden en uniformiteit nodig. Dat betekent dat wet- en regelgeving waarschijnlijk anders opgesteld zal moeten worden in de toekomst. Je moet veel meer definitieafspraken gaan maken. Bijvoorbeeld over: wat is nou een terras? In het kader van milieuwetgeving wordt daar anders over gesproken dan in het kader van de Drank- & Horecawet. Elke gemeente heeft zijn eigen APV waarin hij ook weer een definitie van een terras geeft.   Wil je het die ondernemer en burger makkelijk maken, dan moet je daar veel minder variatie in brengen.  Dat kan alleen door te standaardiseren.</p>',
    'author' => $authors['arjen'],
  ],
];

$why = 'Alles wat gebruikt wordt heeft een ‘leercurve’. Hoe steiler de leercurve, hoe meer moeite het kost om het onder de knie te krijgen. Herkenbare elementen – of het nu een webtekst is of een bepaald proces – zorgen voor een vlakkere leercurve. En hoe minder steil de leercurve is, hoe makkelijker iemand door een systeem of proces gaat.';

$research['text'] =
  '<p>Het ministerie van BZK heeft onderzocht waarom burgers en bedrijven geen gebruik maken van het digitale kanaal van de overheid. Bedrijven kiezen vaak een andere – directe – en veelal bekende route, mede vanwege het ontbreken van uniformiteit bij gemeenten. Bedrijven willen geen tijd verdoen met uitzoeken welk kanaal wanneer en bij welke gemeente moet worden gebruikt, maar snel en effectief de zaken regelen. Het ontbreken van uniformiteit vormt nu een ergernis.</p>' .
  '<hr>' .
  '<cite>(Bron: <a href="#">Eindrapport Massaal Digitaal</a> (Pdf – 919 Kb) en <a href="#">Highlight rapport Algemene bevindingen</a> (Pdf  – 196 Kb).</cite>' .
  '<p>Een voorbeeld bij een casusgemeente (Massaal Digitaal). Bedrijven die een standplaatsvergunning aanvragen doen dit vaak bij veel verschillende gemeenten door het hele land. De methode van aanvraag verschilt per gemeente, om die reden nemen bedrijven vaak eerst telefonisch contact op. “Ik vraag vergunningen aan door het hele land, per mail of online. Vaak bel ik eerst even, anders heb ik alles ingevuld en moet het toch anders”.</p>';


$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Geen',
      'nr' => '0',
      'descr' => 'onderzoek',
    ],
    '2' => [
      'title' => 'Maar wel',
      'nr' => '1',
      'descr' => 'Conclusie',
    ],
  ],
  'conclusion' => '<p>Overheidsinstellingen moeten de mogelijkheden voor uniformiteit verkennen en waar mogelijk toepassen.</p>',
];

/*
 * Set Links
 */

$links = [
  '1' => [
    'title' => 'Standaardisatie binnen de gemeente',
    'descr' => 'Samen met leveranciers werkt KING aan de ontwikkeling van standaarden voor een aantal gemeentelijke ketens. In dit artikel lees je er alles over.',
    'external' => 'true'
  ],
  '2' => [
    'title' => 'GEMMA',
    'descr' => 'GEMMA staat voor de GEMeentelijke Model Architectuur. Dit is de landelijke referentiearchitectuur voor gemeenten. GEMMA helpt gemeenten om (ICT-)ontwikkelingen in samenhang aan te sturen. ',
    'external' => 'true'
    ],
];

$downloads = [];

/*
 * Set related cards
 * */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Samenwerking');
});

$related_cards = array_slice($cards_by_theme, 0, 4);

echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'category' => 'samenwerking',
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
  'nr' => '78',
]);