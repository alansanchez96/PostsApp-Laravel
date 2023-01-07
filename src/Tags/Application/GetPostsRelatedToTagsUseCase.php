<?php

namespace Src\Tags\Application;

use Illuminate\Pagination\Paginator;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Domain\Contract\TagRepositoryContract;

class GetPostsRelatedToTagsUseCase
{
    /**
     * Repository property
     *
     * @var TagRepository
     */
    private $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene un paginador con los Posts relacionados al TagModel recibido
     *
     * @param TagModel $tag
     * @return Paginator
     */
    public function execute(TagModel $tag): Paginator
    {
        return $this->repository->getPostsRelatedToTags($tag);
    }
}
