<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\Contracts\PostRepositoryContract;

class SavePostUseCase
{
    /**
     * Repository property
     *
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Recibe el request y almacena los registros
     *
     * @param mixed $req
     * @param string $url
     * @param integer|null $id
     * @return void
     */
    public function execute(mixed $req, ?string $url, int $id = null)
    {
        return $this->repository->save($req, $url, $id);
    }
}
