<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList());


$data = [
  '1' => [
    'title' => 'De kracht van beeldtaal',
    'descr' => 'Een verslag en presentaties van de webinar ‘De kracht van beeldtaal’. Deze werd georganiseerd door de gemeente Rotterdam in samenwerking met Gebruiker Centraal, op 28 mei 2020',
    'type' => 'blog',
    'img' => 'brand-dd.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
  '2' => [
    'title' => 'Werk mee aan de Corona-app',
    'descr' => 'Gebruiker Centraal zet zich in voor een corona-app die bruikbaar, toegankelijk én gebruiksvriendelijk is. We kunnen jouw hulp hierbij goed bij gebruiken.',
    'type' => 'blog',
    'img' => 'img-16-9.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
  '3' => [
    'title' => 'Nieuwe kennisbank beeldtaal live',
    'descr' => 'Esmeralde Marsman van de Gemeente Rotterdam en medeoprichter van Rotterdammer Centraal vertelt over het ontstaan van de Kennisbank Beeldtaal en de doorontwikkeling van de Kennisbank.',
    'type' => 'blog',
    'img' => 'brand-beeldbank.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
  '4' => [
    'title' => 'Je digitale dienstverlening verbeteren is urgenter dan ooit!',
    'descr' => 'Door de Coronacrisis is digitale toegankelijkheid van de overheid voor iedereen een nog urgenter issue geworden dan het al was. Mensen zijn afhankelijker geworden van die digitale toegangsroute, vanwege hun eigen gezondheidsrisico’s of om anderen te beschermen.',
    'type' => 'blog',
    'img' => 'img-16-9-conference-2.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
  '5' => [
    'title' => 'We zijn gewoon begonnen',
    'descr' => 'Hoe kunnen we als dienstverleners in Rotterdam, de Rotterdammer écht centraal zetten in onze dienstverlening?’ Met die ambitie in het achterhoofd richtte Esmeralde Marsman samen met Victor Zuydweg in 2019 Rotterdammer Centraal op. Waar kwam de behoefte vandaan om Rotterdammer Centraal op te richten en waar begin je nu bij het opzetten van een community? Esmeralde vertelt.',
    'type' => 'blog',
    'img' => 'img-16-9-letter.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
  '6' => [
    'title' => 'Gebruiker Centraal organiseert ‘Design thinking bij de overheid’: training, design sprint en conferentie',
    'descr' => 'Gebruiker Centraal organiseert dit najaar een (online) training inclusief een design sprint week (op 25 verschillende plekken in het land) en een conferentie in het teken van design thinking bij de overheid.',
    'type' => 'blog',
    'img' => 'img-16-9-conference.jpg',
    'meta' => [
      '1' => [
        'title'=> 'Datum',
        'descr' => '14 okt 2020'
      ],
      '2' => [
        'title' => 'Auteur',
        'descr' => 'Gebruiker Centraal Auteur'
      ],
    ]
  ],
];

echo $twig->render('author.html.twig', [
    'site_name' => 'Gebruiker Centraal',
    'data'=> $data
  ]
);