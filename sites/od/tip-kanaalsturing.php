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

$title = 'Bied aan daar waar de burger zoekt';

$body = '<p>Zorg dat je informatie of product goed te vinden is. Dat betekent dat je het daar aanbiedt waar de gebruiker zoekt. Denk daarbij ook buiten je eigen organisatie. Bijvoorbeeld ergens anders in de keten. Of bij organisaties, binnen en buiten de overheid, waar gebruikers ook mee te maken hebben bij die gebeurtenis (zie ook tips 87 en 67).</p>' .
  '<h2>Hoe krijg ik het voor elkaar?</h2>' .
  '<p>Gebruik het kanaal waar je doelgroep ook gebruik van maakt. En onderzoek of je wel goed te vinden bent met een zoekmachine. Dat is, zeker voor overheidsdienstverlening, een belangrijke toeleiding.</p>';

$examples = [
  '1' => [
    'title' => 'Wees voorzichtig met apps',
    'descr' => '<p>Je moet voorzichtig zijn met apps. Ouderen en laagopgeleiden zitten daar niet op te wachten, merken we in onderzoeken. Het is wéér iets wat ze moeten leren. Wéér iets wat ze zich eigen moeten maken. Vaak is de app ook onbekend. Ik heb een onderzoek (PDF – 908 Kb) gedaan voor de gemeente Den Haag naar een aantal apps die in die gemeente zijn ontwikkeld. Ongelooflijk veel mensen kenden die apps gewoon niet. Die worden dan gemaakt, en in de store gezet, en vervolgens weet maar een deel ze te vinden en te gebruiken. Er kunnen dan drie dingen spelen. Dekken zij een bepaalde behoefte helemaal niet, of denkt men dat er een bepaalde behoefte is aan apps terwijl die er niet is? Of kent men het gewoon niet? Een app moet dus echt een toegevoegde waarde hebben.</p>',
    'author' => $authors['wolfgang'],
  ],
  '2' => [
    'title' => 'Zorg dat informatie verkrijgbaar is waar de burger zoekt',
    'descr' => '<p>Hoe zorgen we er voor dat burgers en bedrijven niet verdwalen in overheidsland? Vanuit de Manifestgroep zijn we eigenlijk al best lang bezig met deze problematiek. Waarbij mensen van poppetje A naar poppetje B en naar organisatie C moeten, om de zaken die ze moeten regelen zelf bij elkaar te zoeken. Soms is dat geen enkel probleem. Maar er zijn in het leven van burgers situaties waarbij het wel complex wordt. Dat kan bijvoorbeeld zijn bij een scheiding of een verhuizing, of bij een overlijden of werkloos worden. Dan heb je te maken met meerdere organisaties, en zie er dan maar eens uit te komen.</p>' .
      '<p>Tien jaar geleden zijn we begonnen om onze eigen informatie gezamenlijk aan te bieden op een portal: de life events portalen van de Manifestgroep. Dat was beperkt succesvol. Het was leuk dat we het deden en het hielp. Je kreeg een soort checklist, maar het was nog lang niet compleet. Het had met name één groot nadeel: de burger moest het portal nog wel zien te vinden. Dat is een probleem dat je veel terugziet bij overheidscommunicatie. Voor elk beleidsonderwerp dat de overheid heeft wordt er een portal geschapen. Wat je vervolgens ziet gebeuren is dat er voor zo’n portal aandacht gegenereerd moet worden. Dan krijg je van die standaard publiekscampagnes, soms onlinecampagnes en soms van die zotte URL’s zoals ‘ikganustoppenmetroken.nl’. Volgens mij zijn al die portals vanaf het begin mislukkingen. Omdat ze, en dat hebben wij ook verkeerd gedaan, niet het probleem oplossen dat je vindbaar moet zijn. Zorg daarom dat die informatie verkrijgbaar is waar de burger logischerwijs zoekt. Dat vind ik een van de belangrijkste tips.</p>',
    'author' => $authors['luc'],
  ],
  '3' => [
    'title' => 'Zorg dat informatie verkrijgbaar is waar de burger zoekt',
    'descr' => '<p>We hebben landelijk onderzoek gedaan naar wat inwoners of ondernemers willen doen op gemeentelijke sites. Daaruit is een top 30 voor inwoners gekomen en een top 10 specifiek voor ondernemers. Dat helpt gemeenten en andere overheidsorganisaties om naar hun toptaken te kijken, en hun website in te richten op datgene dat inwoners en ondernemers komen doen. En zo de website meer inrichten als dienstverleningskanaal in plaats van communicatiekanaal.</p>',
    'author' => $authors['leonie'],
  ],
];

$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Gemeenten',
      'nr' => '100%',
      'descr' => 'Twitteraanbod',
    ],
    '2' => [
      'title' => 'Inwoners',
      'nr' => '<20%',
      'descr' => 'Twittergebruik',
    ],
  ],
  'conclusion' => '<p>Apps aanbieden en communiceren via Twitter klinkt leuk, maar mensen gebruiken het veelal niet. Kijk eerst welk kanaal burgers en ondernemers gebruiken, bied daar je informatie en producten aan.</p>',
];

/*
 * Set Links
 */

$links = [
  '1' => [
    'title' => 'Life events',
    'descr' => 'Logius bouwde voor burgers een applicatie om informatie over overheidsdiensten op een handige manier te ontsluiten. Begin dit jaar werden de eerste vier levensgebeurtenissen aangeboden op Overheid.nl: 18 jaar worden; werkloos worden; overlijden en scheiden. Life events stelt de overheid in staat haar informatie breed en zonder controleverlies uit te venten.',
  ],
];

$downloads = [
  '1' => [
    'title' => 'Wees voorzichtig met apps',
    'descr' => 'Wolfgang Ebbers deed onderzoek voor de gemeente Den Haag naar een aantal apps die in die gemeente zijn ontwikkeld. Lees het hele onderzoek (PDF – 908 Kb)',
    'meta' => [
      '1' => [
        'title' => 'filetype',
        'descr' => 'PDF',
      ],
      '2' => [
        'title' => 'filesize',
        'descr' => '908 Kb',
      ],
    ],
  ],
  '2' => [
    'title' => 'Artikel uit InGoverment over Life events',
    'descr' => 'Logius bouwde voor burgers een applicatie om informatie over overheidsdiensten op een handige manier te ontsluiten. Begin dit jaar werden de eerste vier levensgebeurtenissen aangeboden op Overheid.nl: 18 jaar worden; werkloos worden; overlijden en scheiden. Life events stelt de overheid in staat haar informatie breed en zonder controleverlies uit te venten. ',
    'meta' => [
      '1' => [
        'title' => 'filetype',
        'descr' => 'PDF',
      ],
      '2' => [
        'title' => 'filesize',
        'descr' => '908 Kb',
      ],
    ],
  ],
];

$why = 'Optimalisatie van de eigen middelen heeft weinig zin als eindgebruikers er niet komen. Juist door aandacht te geven aan de toeleiding naar informatie en product. Dienstverlening moet aansluiten bij de behoeftes en gewoontes van de eindgebruiker, zodat het ook echt gebruikt gaat worden.';

$research['text'] =
  '<p>Onderzoeker Willem Pieterson (Universiteit Twente) heeft een vergelijking gemaakt tussen het aantal gemeenten dat een Twitteraccount heeft en het aantal inwoners dat Twitter gebruikt. Daaruit blijkt dat er een groot verschil is tussen aanbod en vraag.</p>' .
  '<p>Bron: presentatie Willem Pieterson, <a href="#">De eOverheid is dood, leve de eOverheid! (PDF – 1,2 Mb)</a></p>

<p>Verder blijkt uit Amerikaanse cijfers dat:</p>

<ul>
<li>Apps goed zijn voor 86% van de tijd die doorgebracht wordt op mobiel.</li>
<li>Een groot gedeelte van die tijd naar een select aantal apps gaat.</li>
<li>De top 7% van de appgebruikers goed is voor bijna de helft van alle downloadcapaciteit.</li>
<li>Meer dan de helft van de smartphone gebruikers maandelijks geen nieuwe apps downloadt.</li>
</ul>

<cite>Bron: <a href="#">Marketingfacts</a></cite>';

/*
 * Set related cards
 * */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Kanaalsturing');
});

$related_cards = array_slice($cards_by_theme, 0, 4);

echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'category' => 'kanaalsturing',
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