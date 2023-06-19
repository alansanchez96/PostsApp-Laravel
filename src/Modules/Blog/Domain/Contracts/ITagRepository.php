<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Src\Modules\Blog\Domain\Entities\TagEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;

interface ITagRepository
{
    public function getTag(TagEntity $entity, mixed $tag, array $columns): ?Tag;
}