<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Src\Categories\Application\ShowAllCategories;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;

class Navigation extends Component
{
    public function render()
    {
        $showCategories = new ShowAllCategories(new CategoryModel);
        $categories = $showCategories->execute();

        return view('livewire.navigation', compact('categories'));
    }
}
