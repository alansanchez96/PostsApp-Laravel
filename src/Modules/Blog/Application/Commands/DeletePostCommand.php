<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class DeletePostCommand
{
    public function __construct(private readonly IPostRepository $repository) { }

    public function deletePost(array $data): void
    {
        $this->repository->delete($data);
    }
}