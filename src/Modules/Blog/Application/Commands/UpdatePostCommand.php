<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class UpdatePostCommand
{
    public function __construct(private readonly IPostRepository $repository) { }

    public function execute(array $data)
    {
        $this->repository->save($data, true);
    }
}
