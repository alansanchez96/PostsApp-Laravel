<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blog\Domain\Entities\TagEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;

interface ITagRepository
{
    public function getTag(TagEntity $entity, mixed $tag, array $columns): ?Tag;

    public function getAllTags(array $columns = null): ?Collection;

    public function save(array $data, bool $update = false): void;

    public function delete(array $data): void;
}