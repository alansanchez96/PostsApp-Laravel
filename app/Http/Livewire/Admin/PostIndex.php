<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Src\Posts\Infrastructure\Eloquent\PostModel;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = PostModel::where('user_id', auth()->user()->id)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.post-index', compact('posts'));
    }
}
