<?php

namespace Src\Modules\Blog\Domain\Entities;

use Src\Common\Domain\AggregateRoot;
use Src\Modules\Blog\Domain\ValueObjects\Categories\{
    CategoryId,
    CategoryName,
    CategorySlug,
};

class CategoryEntity extends AggregateRoot
{
    public ?CategoryId $id;
    public ?CategoryName $name;
    public ?CategorySlug $slug;

    public function __construct(array $arguments)
    {
        $this->id = new CategoryId($arguments['id'] ?? null);
        $this->name = new CategoryName($arguments['name'] ?? null);
        $this->slug = new CategorySlug($arguments['slug'] ?? null);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug
        ];
    }
}
