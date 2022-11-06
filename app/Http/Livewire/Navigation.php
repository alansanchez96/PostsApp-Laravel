<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Src\Categories\Infrastructure\RegisteredCategories;

class Navigation extends Component
{
    public function render()
    {
        $categories = RegisteredCategories::getAllCategories();

        return view('livewire.navigation', compact('categories'));
    }
}
