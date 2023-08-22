<?php

namespace Src\Modules\Blog\Domain\Entities;

use Src\Common\Domain\AggregateRoot;
use Src\Modules\Blog\Domain\ValueObjects\Tags\{
    TagId,
    TagName,
    TagSlug,
    TagColor
};

class TagEntity extends AggregateRoot 
{
    public ?TagId $id;
    public ?TagName $name;
    public ?TagSlug $slug;
    public ?TagColor $color;
    
    public function __construct(array $arguments)
    {
        $this->id = new TagId($arguments['id'] ?? null);
        $this->name = new TagName($arguments['name'] ?? '');
        $this->slug = new TagSlug($arguments['slug'] ?? '');
        $this->color = new TagColor($arguments['color'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'color' => $this->color,
        ];
    }
}