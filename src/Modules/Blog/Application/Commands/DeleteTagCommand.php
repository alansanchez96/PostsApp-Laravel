<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ITagRepository;

class DeleteTagCommand
{
    public function __construct(private readonly ITagRepository $repository) { }

    public function deleteTag(array $data): void
    {
        $this->repository->delete($data);
    }
}