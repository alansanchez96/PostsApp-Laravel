<?php

use Illuminate\Support\Facades\Storage;

class PostRelatedImage
{
    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function value()
    {
        return $this->image;
    }

    public static function deleteProperty($class)
    {
        Storage::delete($class->image->url);
    }
}
