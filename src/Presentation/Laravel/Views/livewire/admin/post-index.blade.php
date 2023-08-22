<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
        </div>

        @if ($posts->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            @can('admin.post.index')
                                <th colspan="2">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @can('admin.post.index')
                                        <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('admin.post.index')
                                        <form method="post" action="{{ route('admin.post.destroy', $post->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No se han encontrado coincidencias</strong>
            </div>
        @endif
    </div>
</div>
