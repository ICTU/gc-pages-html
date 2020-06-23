<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MakeId extends AbstractExtension {

  public function getFilters() {
    return [
      new TwigFilter('makeid', [$this, 'MakeId']),
    ];
  }

  public function MakeId($string) {

    // Strip out any %-encoded octets.
    $content = preg_replace('/[[:space:]]+/', '-', $string);

    // Limit to A-Z, a-z, 0-9, '_', '-'.
    $content = strtolower(preg_replace( '/[^A-Za-z0-9_-]/', '', $content ));


    return $content;
  }
}