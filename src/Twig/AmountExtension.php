<?php 

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AmountExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('amount', [
                $this,'changeAmount'
            ])
        ];
    }

    public function changeAmount($value)
    {
        $finalValue = $value / 100;

        $finalValue = number_format($finalValue,0,',',' ');

        return $finalValue . ' €';
    }
}