<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class DeleteCategoryCommand
{
    public function __construct(private readonly ICategoryRepository $repository) { }

    public function deleteCategory(array $data): bool
    {
        $category = $this->repository->getCategory($data);

        if ($category->posts()->count() > 0) return false;

        $this->repository->delete($data);

        return true;
    }
}