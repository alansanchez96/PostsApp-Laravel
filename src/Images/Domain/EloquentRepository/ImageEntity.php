<?php

namespace Src\Images\Domain\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImageEntityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageEntity extends Model
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
        return ImageEntityFactory::new();
    }
}
