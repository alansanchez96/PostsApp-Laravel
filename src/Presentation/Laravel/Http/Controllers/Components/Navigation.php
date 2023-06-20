<?php

namespace Src\Presentation\Laravel\Http\Controllers\Components;

use Livewire\Component;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::select('id', 'name', 'slug')->get();

        return view('livewire.navigation', compact('categories'));
    }
}
