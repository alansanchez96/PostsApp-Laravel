<?php

namespace Src\Tags\Infrastructure;

class GetColorsTag
{
    /**
     * Return array colors
     *
     * @return array
     */
    public function getColorsTag(): array
    {
        return [
            'red' => 'Rojo',
            'blue' => 'Azul',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'indigo' => 'Indigo',
            'purple' => 'Purpura',
            'pink' => 'Rosa',
        ];
    }
}
