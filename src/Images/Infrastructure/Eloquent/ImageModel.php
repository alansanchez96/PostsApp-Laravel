<?php

namespace Src\Images\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImageModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'images';

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

    protected static function newFactory()
    {
        return ImageModelFactory::new();
    }
}
