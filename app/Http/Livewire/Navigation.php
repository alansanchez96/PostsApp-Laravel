<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Src\Categories\Application\GetAllCategoriesUserCase;
use Src\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Categories\Infrastructure\GetAllCategories;

class Navigation extends Component
{
    public function render()
    {
        $getAllCategories = new GetAllCategories;
        $categories = $getAllCategories->execute();

        return view('livewire.navigation', compact('categories'));
    }
}
