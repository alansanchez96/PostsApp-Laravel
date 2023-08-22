<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blog\Domain\Entities\CategoryEntity;
use Illuminate\Support\Collection as PluckCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Src\Modules\Blog\Infrastructure\Persistence\Category;
use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function __construct(private readonly Category $category) { }

    public function getCategory(CategoryEntity $entity, mixed $category, array $columns): ?Category
    {
        try {
            return (is_int($category))
                ?   $this->category->select($columns)->find($entity->id->getId())
                :   $this->category->select($columns)->firstWhere('slug', $entity->slug->getSlug());
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getAllCategories(array $columns = null): ?Collection
    {
        try {
            return isset($columns)
                ?   $this->category->select($columns)->get()
                :   $this->category->all();
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
        $entity = new CategoryEntity($data);

        try {
            $this->category->create([
                'name'  =>  $entity->name->getName(),
                'slug'  =>  $this->toSlug($entity->name->getName()),
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    private function update(array $data): void
    {
        $entity = new CategoryEntity($data);

        try {
            $category = $this->category->findOrFail($entity->id->getId());

            $category->update([
                'name'  =>  $entity->name->getName(),
                'slug'  =>  $this->toSlug($entity->name->getName()),
            ]);
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }

    public function delete(array $data): void
    {
        $entity = new CategoryEntity($data);

        try {
            $this->category->findOrFail($entity->id->getId())->delete();
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage());
        }   
    }
}