<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Src\Categories\Application\GetAllCategoriesUseCase;
use Src\Categories\Infrastructure\Eloquent\Repositories\CategoryRepository;

class Navigation extends Component
{
    public function render()
    {
        $categories = (new GetAllCategoriesUseCase(new CategoryRepository))->execute();

        return view('livewire.navigation', compact('categories'));
    }
}
