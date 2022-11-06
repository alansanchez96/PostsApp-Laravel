<x-layouts.layout>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <article>
                {{ $post->image() }} <br>
            </article>
        @endforeach
    </div>
</x-layouts.layout>
