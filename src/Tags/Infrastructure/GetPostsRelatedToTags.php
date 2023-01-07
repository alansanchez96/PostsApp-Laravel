<?php

namespace Src\Tags\Infrastructure;

use Illuminate\Pagination\Paginator;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Application\GetPostsRelatedToTagsUseCase;

class GetPostsRelatedToTags
{
    /**
     * Use case GetPostsRelatedToTags
     *
     * @var GetPostsRelatedToTagsUseCase
     */
    private $getPostsRelatedToTags;

    public function __construct(GetPostsRelatedToTagsUseCase $getPostsRelatedToTags)
    {
        $this->getPostsRelatedToTags = $getPostsRelatedToTags;
    }

    /**
     * Obtiene un paginador con los Posts relacionados al TagModel recibido
     *
     * @param TagModel $tag
     * @return Paginator
     */
    public function execute(TagModel $tag): Paginator
    {
        return $this->getPostsRelatedToTags->execute($tag);
    }
}
