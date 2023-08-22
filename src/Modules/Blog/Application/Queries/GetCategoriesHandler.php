<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\UseCases;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class GetCategoriesHandler extends UseCases
{
    public function __construct(private readonly ICategoryRepository $repository) { }

    public function getCategory(mixed $category, array $columns = null)
    {
        $data = ['slug' => $category];

        if (ctype_digit($category))
            $data = ['id' => (int) $category];

        try {
            $category = $this->repository->getCategory($data, $columns);

            return ! is_null($category)
                ?   $category
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function getAllCategories(array $columns = null)
    {
        try {
            $categories = $this->repository->getAllCategories($columns);
        
            return ! is_null($categories)
                ?   $categories
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }
}
