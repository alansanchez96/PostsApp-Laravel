<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class DeleteCategoryCommand
{
    public function __construct(private readonly ICategoryRepository $repository) { }

    public function deleteCategory(array $data): void
    {
        $this->repository->delete($data);
    }
}