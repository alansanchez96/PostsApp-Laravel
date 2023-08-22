<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Infrastructure\Persistence\Post;

interface IPostRepository
{
    public function getActivePosts(int $pages = null): Collection|LengthAwarePaginator;
    
    public function getPost(array $data, array $columns = null): ?Post;

    public function getRelatedPosts(array $data, array $columns = null): ?Collection;

    public function getPostsBy(EloquentModel $model, array $relationship, array $columns = null, int $pages = null): Collection|LengthAwarePaginator;

    public function save(array $data, bool $update = false): void;

    public function delete(array $data): void;
}