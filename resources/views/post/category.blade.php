<x-layouts.layout>

    <div class="container max-w-5xl mx-auto">

        <h1 class="text-center font-bold text-3xl my-10">Categoria <span class="uppercase">{{ $category->name }}</span>
        </h1>
        @foreach ($posts as $post)
            <x-layouts.card-post :post="$post"/>
        @endforeach

        <div class="mt-6">
            
            {{$posts->links()}}
        </div>
    </div>
</x-layouts.layout>
