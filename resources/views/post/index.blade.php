<x-layouts.layout>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        @foreach ($posts as $post)
            <article style="background: url('{{ Storage::url($post->image->url) }}')"
                class="h-80 bg-no-repeat rounded w-full bg-cover bg-center @if ($loop->first) md:col-span-2 @endif">
                <div class="w-full h-full mx-auto px-10 flex flex-col justify-center align-center">
                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}"
                                class="inline-block m-0 mb-2 rounded-full text-gray-200 font-semibold bg-{{ $tag->color }}-600 px-3 py-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <h1 class="text-3xl font-bold w-full">
                        <a href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach
    </div>
</x-layouts.layout>
