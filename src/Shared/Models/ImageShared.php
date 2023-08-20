<?php

namespace Src\Shared\Models;

use Database\Factories\ImageModelFactory;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageShared extends EloquentModel
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

    // protected static function newFactory()
    // {
    //     return ImageModelFactory::new();
    // }
}
