<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFilter;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($loader, ['debug' => TRUE]);
$twig->addExtension(new DebugExtension);

// Add group filter for evens output
$filter = new TwigFilter('group', function ($items) {
  $output = '';
  $months = [];

  $tz = new DateTimeZone('Europe/Amsterdam');

  $load = new FilesystemLoader(__DIR__ . '/templates');
  $env = new Environment($load, ['debug' => TRUE]);

  $now = new DateTime();
  $now->setTimezone($tz);

  foreach ($items as $item) {
    $time = new DateTime ($item['start_date']);

    // If item is in future
    if ($time >= $now) {
      $months[$time->format('Ym')]['items'][] = $item;
      $months[$time->format('Ym')]['name'] = $time->format('F Y');
    }
  }


  foreach ($months as $item) {

    $output .= '<h3 class="overview__group-title">' . $item['name'] . '</h3>';
    $output .= '<div class="overview__item-wrapper">';

    $i = 0;

    foreach ($item['items'] as $event) {
      $template = $env->load('components/teaser.html.twig');

      $start_date = new DateTime($event['start_date']);
      $end_date = new DateTime($event['end_date']);

      $meta_data = $event['meta'];

      /*
      $meta_data['date']['title'] = 'Datum';

      if ($start_date->format('d-m') === $end_date->format('d-m')) {
        // same day
        $meta_data['date']['descr'] = $start_date->format('H:i') . ' - ' . $end_date->format('H:i');
      } else {
        $meta_data['date']['descr'] = $start_date->format('d M, H:i') . ' tot ' . $end_date->format('d M, H:i');
      }*/


      $output .= $template->render([
        'title' => $event['title'],
        'descr' => $event['descr'],
        'img' => $event['img'],
        'meta' => $meta_data,
        'type' => $event['type'],
        'full' => $event['full'],
        'start_date' => $event['start_date'],
        'end_date' => $event['end_date'],
      ]);
    }

    $output .= '</div>';
  }

  echo $output;
});

$twig->addFilter($filter);

echo $twig->render('overview.html.twig', [
  'title' => 'Evenementen',
  'body' => 'We organiseren veel evenementen door het hele land.',
  'overview' => 'events',
  'modifier' => ' page--overview-archive',
  'breadcrumb' => [
    'page_title' => 'Evenementen',
    'links' => [
      'Home'
    ]
  ]
]);