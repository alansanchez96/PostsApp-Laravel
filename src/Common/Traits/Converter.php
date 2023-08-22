<?php

namespace Src\Common\Traits;

use Illuminate\Support\Str;

trait Converter
{
    public function lower($string): string
    {
        return strtolower($string);
    }

    public function randomCode(int $lenght): string
    {
        return Str::upper(Str::random($lenght));
    }

    public function capitalized($string): string
    {
        return ucfirst(strtolower($string));
    }

    public function toSlug(string $string)
    {
        $slug = str_replace(' ', '-', $string);

        $slug = $this->lower($slug);

        return preg_replace('/[^a-zA-Z0-9-]/', '', $slug);
    }
}
