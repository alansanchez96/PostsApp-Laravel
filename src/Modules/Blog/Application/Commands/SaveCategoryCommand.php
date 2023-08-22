<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class SaveCategoryCommand
{
    public function __construct(private readonly ICategoryRepository $repository) { }

    public function execute(array $data)
    {
        $this->repository->save($data);
    }
}