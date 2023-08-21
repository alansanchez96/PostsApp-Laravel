<?php

namespace Src\Common\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function update(Model $model, string $path, mixed $photo): void
    {
        $url = Storage::put($path, $photo);
        $imageData = ['url' => $url];

        if ($model->image) {
            $model->image()->update($imageData);
        } else {
            $model->image()->create($imageData);
        }
    }
}
