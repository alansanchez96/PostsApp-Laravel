<?php

namespace Src\Modules\Blog\Application\Commands;

use Src\Modules\Blog\Domain\Contracts\ITagRepository;

class UpdateTagCommand
{
    public function __construct(private readonly ITagRepository $repository) { }

    public function execute(array $data)
    {
        $this->repository->save($data, true);
    }
}
