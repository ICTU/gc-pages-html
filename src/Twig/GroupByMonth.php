<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class GroupByMonth extends AbstractExtension {

  public function getFilters() {
    return [
      new TwigFilter('group', [$this, 'ByMonth']),
    ];
  }

  public function ByMonth($items) {
    $output = '';
    $months = [];

    $tz = new \DateTimeZone('Europe/Amsterdam');

    $load = new FilesystemLoader($_SERVER["DOCUMENT_ROOT"] . '/templates');
    $env = new Environment($load, ['debug' => TRUE]);

    $now = new \DateTime();
    $now->setTimezone($tz);

    foreach ($items as $item) {
      $time = new \DateTime ($item['start_date']);

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

        $start_date = new \DateTime($event['start_date']);
        $end_date = new \DateTime($event['end_date']);

        $meta_data = $event['meta'];

        /*
        $meta_data['date']['title'] = 'Datum';

        if ($start_date->format('d-m') === $end_date->format('d-m')) {
          // same day
          $meta_data['date']['descr'] = $start_date->format('H:i') . ' - ' . $end_date->format('H:i');
        } else {
          $meta_data['date']['descr'] = $start_date->format('d M, H:i') . ' tot ' . $end_date->format('d M, H:i');
        } */


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
  }
}