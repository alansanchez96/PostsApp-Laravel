<x-layouts.layout>

    <h1 class="text-center font-bold text-3xl my-10">Categoria <span class="uppercase">{{ $category->name }}</span></h1>
    @foreach ($posts as $post)
        {{ $post->title }}
    @endforeach
</x-layouts.layout>
