<x-layouts.layout>

    <div class="container max-w-5xl mx-auto">

        <h1 class="text-center font-bold text-3xl my-10">Etiqueta <span class="uppercase">{{ $tag->name }}</span>
        </h1>
        @foreach ($posts as $post)
            <x-layouts.card-post :post="$post" />
        @endforeach

        <div class="my-10 mx-auto w-full">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.layout>
