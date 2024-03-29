<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blog\Domain\Entities\TagEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;
use Src\Modules\Blog\Domain\Contracts\ITagRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagRepository extends BaseRepository implements ITagRepository 
{
    public function __construct(private readonly Tag $tag) { }

    public function getTag(array $data, array $columns = null): ?Tag
    {
        $entity = new TagEntity($data);

        try {
            $query = $this->tag->query();

            if (!is_null($columns)) $query->select($columns);

            return ! is_null($entity->id->getId())
                ?   $query->findOrFail($entity->id->getId())
                :   $query->where('slug', $entity->slug->getSlug())->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function getAllTags(array $columns = null): ?Collection
    {
        try {
            return isset($columns)
                ?   $this->tag->select($columns)->get()
                :   $this->tag->all();
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function save(array $data, bool $update = false): void
    {
        !$update ? $this->create($data) : $this->update($data);
    }

    private function create(array $data): void
    {
        $entity = new TagEntity($data);

        try {
            $this->tag->create([
                'name'  =>  $entity->name->getName(),
                'slug'  =>  $this->toSlug($entity->name->getName()),
                'color' =>  $entity->color->getColor(),
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    private function update(array $data): void
    {
        $entity = new TagEntity($data);

        try {
            $tag = $this->tag->findOrFail($entity->id->getId());

            $tag->update([
                'name'  =>  $entity->name->getName(),
                'slug'  =>  $this->toSlug($entity->name->getName()),
                'color' =>  $entity->color->getColor(),
            ]);
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function delete(array $data): void
    {
        $entity = new TagEntity($data);

        try {
            $this->tag->findOrFail($entity->id->getId())->delete();
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }
}