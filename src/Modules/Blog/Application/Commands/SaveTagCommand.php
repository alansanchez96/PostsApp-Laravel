<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ITagRepository;

class SaveTagCommand
{
    public function __construct(private readonly ITagRepository $repository) { }

    public function execute(array $data)
    {
        $this->repository->save($data);
    }
}