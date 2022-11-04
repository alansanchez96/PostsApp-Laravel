<?php

namespace Src\Images\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageEntity extends Model
{
    use HasFactory;

    /**
     * Agregacion Masiva
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relacion Polimorfica
     *
     * @return void
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
