<?php

namespace Src\Modules\Blog\Domain\Entities;

use Src\Common\Domain\AggregateRoot;
use Src\Modules\Auth\Domain\ValueObjects\UserId;
use Src\Modules\Blog\Domain\ValueObjects\Categories\CategoryId;
use Src\Modules\Blog\Domain\ValueObjects\Posts\{
    PostId,
    PostTitle,
    PostSlug,
    PostBody,
    PostStatus,
    PostExtract
};

class PostEntity extends AggregateRoot 
{
    public ?PostId $id;
    public ?PostTitle $title;
    public ?PostSlug $slug;
    public ?PostExtract $extract;
    public ?PostBody $body;
    public ?PostStatus $status;
    public ?CategoryId $category_id;
    public ?UserId $user_id;

    public function __construct(array $arguments)
    {
        $this->id = $arguments['id'] ?? null;
        $this->title = new PostTitle($arguments['title'] ?? '');
        $this->slug = new PostSlug($arguments['slug'] ?? '');
        $this->extract = new PostExtract($arguments['extract'] ?? '');
        $this->body = new PostBody($arguments['body'] ?? '');
        $this->status = new PostStatus($arguments['status'] ?? '');
        $this->category_id = new CategoryId($arguments['category_id'] ?? null);
        $this->user_id = new UserId($arguments['user_id'] ?? null);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'extract' => $this->extract,
            'body' => $this->body,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id
        ];
    }
}