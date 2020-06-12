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

$title = 'Sta als bestuurder voor informatieveiligheid';

$body = '<p>Toon als bestuurder leiderschap als het gaat om informatieveiligheid.
Persoonlijke gegevens zijn je toevertrouwd door burgers en bedrijven. Je bent er verantwoordelijk voor.</p>' .
  '<h3>Hoe krijg je het voor elkaar?</h3>' .
  '<p>Werk binnen de organisatie continu aan bewustwording van de waarde van privacygevoelige data waarmee wordt gewerkt. En aan het besef hoeveel schade het toe kan brengen aan burgers, maar ook aan de overheid zelf, als data op straat komt te liggen. Want de meeste lekken ontstaan door menselijke fouten. Zet het onderwerp hoog op de agenda en laat zien dat het je menens is.</p>';


/*
 * Voorbeelden
 */

$examples = [
  '1' => [
    'title' => 'Draagvlak van management',
    'descr' => '<p>Draagvlak van het management is heel belangrijk. Het ligt in feite in de rol van de manager besloten dat hij of zij aandacht besteedt aan de bewustwording rond informatieveiligheid. Misschien is dat bij uitvoerende organisaties anders, maar onze ervaring is dat beleidsmanagers nog onvoldoende bewust zijn van wat informatiebeveiliging inhoudt. Het is daarom belangrijk om óók het kennisniveau bij managers te vergroten. Gelukkig zien we dat er steeds meer aandacht voor is. Ik merk bijvoorbeeld dat er door managers vlak voor de zomervakantie tips worden gegeven via de mail en intranet. Bijvoorbeeld over het meenemen van de mobiele telefoon op vakantie.</p>',
    'author' => $authors['annet'],
  ],
  '2' => [
    'title' => 'Informatieveiligheid begint met bewustwording van de waarde van de data',
    'descr' => '<p>Maak mensen bewust van de waarde van data. Ik denk dat dat nog weleens onderschat wordt. Er wordt tegenwoordig zo veel data verzameld en opgeslagen en bewerkt zonder dat mensen zich realiseren wat de waarde daarvan is. Aan puur data heb je niet zoveel. Maar zodra je daar informatie van maakt, door samen te voegen en verbanden te leggen, wordt dat goud in handen van mensen die daar echt goede dingen mee kunnen doen. Maar het wordt natuurlijk ook goud in handen van mensen die daar slechte dingen mee willen doen.</p>',
    'author' => $authors['rein'],
  ],
  '3' => [
    'title' => 'Veiligheid kan je niet outsourcen',
    'descr' => '<p>Een heel belangrijke tip voor bestuurders: je kunt veiligheid niet outsourcen. Je blijft altijd zelf verantwoordelijk. Zelfs als je de IT afneemt van een externe partij, blijf jij nog steeds zelf verantwoordelijk voor informatiebeveiliging. Jij moet je verantwoorden naar de burger.</p>',
    'author' => $authors['joab'],
  ],
  '4' => [
    'title' => 'Cybersecurity hoort op de bestuurlijke agenda',
    'descr' => '<p>“Er is een groeiend bewustzijn bij bestuurders dat zij verantwoordelijk zijn voor cybersecurity, maar we zijn er nog lang niet”, zegt Elly van den Heuvel, secretaris van de Cyber Security Raad. Cyberdreigingen nemen rap toe. Daar is nog veel te winnen, schetst Van den Heuvel: “Op bestuurlijk niveau is vaak niet genoeg aandacht voor dit onderwerp. Terwijl informatieveiligheid van cruciaal belang is voor het functioneren van organisaties, zowel voor bedrijven als de overheid.' .
      '<span class="text-style--quote">Digicommissaris Bas Eenhoorn: “Heb je als bestuurder voldoende kennis van dit onderwerp, of sta je straks te stotteren op de persconferentie na de hack?”</span>' .
      '<cite>Bas Eenhoorn, digicommissaris</cite>' .
      'De overheid beheert veel gevoelige gegevens van burgers, denk aan informatie over inkomens. Burgers moeten erop aankunnen dat die informatie bij de overheid in veilige handen is.”</p>' .
      '<a href="#" class="link link--read-more link--external">Lees verder op iBestuur</a>',

  ],
  '5' => [
    'title' => 'Ensia helpt bij verantwoording informatieveiligheid',
    'descr' => '<p>Medio 2017 zijn alle gemeenten gaan werken met één zelfevaluatietool voor informatieveiligheid: ENSIA. “Dat vermindert de werkdruk en het helpt gemeenten om ‘in control’ te zijn”, stelt Franc Weerwind, burgemeester van Almere en voorzitter van de commissie Dienstverlening en Informatiebeleid VNG.</p>' .
      '<p>“In 2013 hebben gemeenten een VNG-resolutie aangenomen waarin staat dat informatieveiligheid een randvoorwaarde is voor de professionele gemeente. Daar moet het natuurlijk niet bij blijven”, zegt VNG-bestuurder Weerwind. “Gemeenten moeten hun informatieveiligheid effectief en efficiënt blijven inrichten en zorgen dat dit onderwerp hoog op de bestuurlijke en ambtelijke agenda staat.” (…) “Het maakt mij gelukkig dat alle gemeenten zijn aangesloten. Informatieveiligheid wordt steeds meer bestuurlijk gedragen. Dat bewustwordingsproces is het allerbelangrijkste.”' .
      '<a href="#" class="link link--read-more link--external">Lees verder op iBestuur.</a></p>',
  ],
];

$rblocks = [
  'items' => [
    '1' => [
      'title' => 'Aantal',
      'nr' => '484',
      'descr' => 'meldingen',
    ],
    '2' => [
      'title' => 'Vooral meldingen',
      'nr' => '331',
      'descr' => 'over gemeenten',
    ],
    '3' => [
      'title' => 'Type datalekken',
      'nr' => '40%',
      'descr' => 'verkeerde ontvanger pers. gegevens',
    ],
  ],
  'conclusion' => '<p>Datalekken zijn een serieus probleem, vooral bij gemeenten.</p>',
];


$why = 'Weet ik niet, deze tip heeft eigenlijk geen waarom werkt dit blokje. Ik laat hem toch staan voor de kleur.';

$research['text'] = '<p>De Autoriteit Persoonsgegevens (AP) publiceert in 2017 elk kwartaal een totaaloverzicht van alle gemelde datalekken. De resultaten van het 1e kwartaal voor de sector openbaar bestuur:</p>';
$research['source'] = '<p>(Bron: <a href="#" class="link link--download link--external">Autoriteit Persoonsgegevens, PDF – 189 Kb)</a></p>';

/*
 * Set Links
 */

$links = [
  '1' => [
    'title' => 'Artikel over ENSIA op de site van Digitale Overheid',
    'descr' => 'Slim en transparant verantwoording afleggen over informatieveiligheid in gemeenten. Sinds 1 juli 2017 is de vragenlijst voor de zelfevaluatie beschikbaar, en gaan gemeenten daadwerkelijk aan de slag. Hoe werkt zo’n zelfevaluatie en wat komt er bij kijken?',
    'external' => 'true'
  ],
  '2' => [
    'title' => 'Tegenlicht uitzending Slimme steden',
    'descr' => 'Tegenlicht uitzending met aandacht voor privacy en verantwoordelijkheden van bestuurders. Met Aral Balkan (Cyborg rights activist) en Ger Baron (CTO Amsterdam)',
    'external' => 'true'
  ],
  '3' => [
    'title' => 'Website Autoriteit Persoonsgegevens',
    'descr' => 'Verwerkt u persoonsgegevens? Dan is het uw verantwoordelijkheid om dit in overeenstemming met de Wet bescherming persoonsgegevens te doen. De Autoriteit Persoonsgegevens houdt hier toezicht op.'
  ],
];

$downloads = [
  '1' => [
    'title' => 'Handleiding voor bestuurders',
    'descr' => 'Een praktische handleiding met checklists onwikkeld door de Cyber Security Raad.',
    'meta' => [
      '1' => [
        'title' => 'filetype',
        'descr' => 'PDF'
      ],
      '2' => [
        'title' => 'filesize',
        'descr' => '189 Kb'
      ]
    ]
  ],
  '2' => [
    'title' => 'Rapport Autoriteit Persoonsgegevens',
    'descr' => 'Datalekken zijn een serieus probleem, vooral bij gemeenten.',
    'meta' => [
      '1' => [
        'title' => 'filetype',
        'descr' => 'PDF'
      ],
      '2' => [
        'title' => 'filesize',
        'descr' => '189 Kb'
      ]
    ]
  ],
  '3' => [
    'title' => 'Download zonder description',
    'meta' => [
      '1' => [
        'title' => 'filetype',
        'descr' => 'PDF'
      ]
    ]
  ],
];


/*
 * Set related cards
 */

$cards_data = file_get_contents("data/cards.json");
$cards = json_decode($cards_data, TRUE);


$cards_by_theme = array_filter($cards, function ($var) {
  return ($var['category'] == 'Informatieveiligheid');
});

$related_cards = array_slice($cards_by_theme, 0, 4);

echo $twig->render('single-tipkaart.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'logo' => 'img/logo/od.svg',
  'category' => 'informatieveiligheid',
  'title' => $title,
  'body' => $body,
  'examples' => $examples,
  'why' => $why,
  'rblocks' => $rblocks,
  'research' => $research,
  'downloads' => $downloads,
  'links' => $links,
  'related' => $related_cards,
  'sprite_url' => '/theme/img/sprites/optimaal-digitaal/defs/svg/sprite.defs.svg',
  'nr' => '94',
]);