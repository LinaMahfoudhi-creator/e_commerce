<?php

namespace App\TwigExtensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MyCustomTwigExtensions extends AbstractExtension
{
    public function getFilters(){
        return [
            new TwigFilter('defaultImage', [$this, 'defaultImage']),
        ];
    }
    public function defaultImage($path): string
    {
        if (!$path) {
            return 'default_image.jpg';
        }

        return $path;
    }
}