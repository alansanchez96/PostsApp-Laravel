<?php

namespace App\Http\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Src\Posts\Infrastructure\Eloquent\PostModel;

class PostIndex extends Component
{
    use WithPagination;

    public $search;

    /**
     * Cambia los estilos de tailwind a bootstrap
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * Actualiza la pagina cada vez que se renderiza el search
     *
     * @return void
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Renderiza la consulta cada vez que surjan cambios y obtiene un paginador
     *
     * @return View
     */
    public function render(): View
    {
        $posts = PostModel::where('user_id', auth()->user()->id)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.post-index', compact('posts'));
    }
}
