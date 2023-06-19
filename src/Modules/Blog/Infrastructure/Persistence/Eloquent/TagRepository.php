<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Src\Modules\Blog\Domain\Entities\TagEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;
use Src\Modules\Blog\Domain\Contracts\ITagRepository;

class TagRepository extends BaseRepository implements ITagRepository 
{
    public function __construct(private readonly Tag $tag) { }

    public function getTag(TagEntity $entity, mixed $tag, array $columns): ?Tag
    {
        try {
            return (is_int($tag))
                ?   $this->tag->select($columns)->find($entity->id->getId())
                :   $this->tag->select($columns)->firstWhere('slug', $entity->slug->getSlug());
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}