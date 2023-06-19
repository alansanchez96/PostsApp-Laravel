<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Src\Modules\Blog\Domain\Entities\CategoryEntity;
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
}