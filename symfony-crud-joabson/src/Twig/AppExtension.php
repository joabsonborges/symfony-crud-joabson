<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('price', [$this, 'formatPrice']),
            new TwigFilter('tel', [$this, 'addtel']),
        ];
    }

    public function formatPrice($number, $decimals = 0)
    {
        $price = number_format($number, $decimals);
        $price = 'Tel '.$price;

        return $price;
    }

}