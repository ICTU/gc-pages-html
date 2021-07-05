<?php


$directory = $_SERVER['DOCUMENT_ROOT'];

require $directory . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

use App\Twig\ClassList;
use App\Twig\MakeId;

$loader = new FilesystemLoader([$directory . '/templates', 'templates']);
$twig = new Environment($loader, ['debug' => TRUE]);

$twig->addExtension(new DebugExtension);
$twig->addExtension(new ClassList);
$twig->addExtension(new MakeId);


$title = 'Word spelleider';

$intro = 'In een Spelleider sessie maak je als deelnemer kennis met het spel en leer je ondertussen de do’s en don’ts in de rol van spelleider. We gaan vol overgave twee uur aan de slag met het spel.';

// form, grouped

$form = [
  //form general
  'id' => 'word-spelleider',
  'actions' => [
    'submit' => [
      'text' => 'Verzenden',
    ],
  ],
  'items' => [

    //form group
    '1' => [
      'title' => '',
      'id' => 'general',
      'type' => 'group',

      // form items
      'elements' => [
        '1' => [
          'label' => 'Naam',
          'type' => 'text',
          'required' => TRUE,
        ],
        '2' => [
          'label' => 'E-mail adres',
          'type' => 'email',
          'required' => TRUE,
        ],
        '3' => [
          'label' => 'Telefoonnummer',
          'type' => 'tel',
          'descr' => 'We gebruiken deze alleen om contact op te nemen over het plannen van de sessie.',
        ],
      ],
    ],
    //form group
    '2' => [
      'title' => 'Meer informatie',
      'id' => 'more-info',
      'type' => 'group',

      // form items
      'elements' => [
        '1' => [
          'label' => 'Uw organisatie en dienstverlening',
          'type' => 'textarea',
          'descr' => 'Omschrijf hier kort wat uw organisatie precies doet met (digitale) dienstverlening en hoe u het spel wil gaan gebruiken.',
        ],
        '2' => [
          'label' => 'Vragen of opmerkingen:',
          'type' => 'textarea',
        ],
      ],
    ],
  ],
  'actions' => [
    'text' => 'Nu verzenden',
  ],
];


$album = [
  '1' => [
    'url' => 'od-spelleider-1.jpg',
    'alt' => 'Platje 1'
  ],
  '2' => [
    'url' => 'od-spelleider-2.png',
    'alt' => 'Platje 1'
  ],
  '3' => [
    'url' => 'od-spelleider-3.png',
    'alt' => 'Platje 1'
  ],
  '4' => [
    'url' => 'od-spelleider-4.png',
    'alt' => 'Platje 1'
  ],
  '5' => [
    'url' => 'od-spelleider-1.jpg',
    'alt' => 'Platje 1'
  ],
  '6' => [
    'url' => 'od-spelleider-2.png',
    'alt' => 'Platje 1'
  ],
  '7' => [
    'url' => 'od-spelleider-3.png',
    'alt' => 'Platje 1'
  ]
];

echo $twig->render('od-page.html.twig', [
  'site_name' => 'Optimaal Digitaal',
  'site_slogan' => 'Verbeter spelenderwijs je (online) dienstverlening',
  'theme' => 'od',
  'page' => 'word_spelleider',
  'title' => $title,
  'intro' => $intro,
  'form' => $form,
  'album' => $album,
  'logo' => 'img/logo/od.svg',
]);