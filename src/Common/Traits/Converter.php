<?php

namespace Src\Common\Traits;

trait Converter
{
    public function lower($string): string
    {
        return strtolower($string);
    }

    public function capitalized($string): string
    {
        return ucfirst(strtolower($string));
    }
}
