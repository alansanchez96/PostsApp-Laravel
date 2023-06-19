<?php

namespace Src\Modules\Blog\Infrastructure\Http\Components;

use Livewire\Component;
use Src\Categories\Application\GetAllCategoriesUseCase;
use Src\Categories\Infrastructure\Eloquent\Repositories\CategoryRepository;

class NavigationComponent extends Component
{
    public function render()
    {
        // $categories = (new GetAllCategoriesUseCase(new CategoryRepository))->execute();

        return view('livewire.navigation', compact('categories'));
    }
}
