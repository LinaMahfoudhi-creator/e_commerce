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
    public function defaultImage(string $path): string
    {
        // Use the correct relative path from the public directory
        $relativePath = 'assets/cartes_postales/' . $path;
        $absolutePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $relativePath;

        // Log the path to ensure it's correct
        error_log('Checking file: ' . $absolutePath);

        // Check if the file exists on the server
        if (!is_file($absolutePath)) {
            return 'assets/cartes_postales/cat3.jpg'; // Fallback image
        }

        return $relativePath; // Path returned for use in Twig
    }
}