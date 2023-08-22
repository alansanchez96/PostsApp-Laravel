<?php

namespace Src\Common\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Src\Common\Interfaces\Laravel\EloquentModel;

class ImageService
{
    public function save(EloquentModel|Model $model, string $path, mixed $photo): void
    {
        $url = Storage::put($path, $photo);

        $imageData = ['url' => $url];

        if ($model->image) {
            $this->delete($model->image->url);
            $model->image()->update($imageData);
        } else {
            $model->image()->create($imageData);
        }
    }

    private function delete(string $url)
    {
        Storage::delete($url);
    }
}
