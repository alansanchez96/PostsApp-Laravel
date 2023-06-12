<x-layouts.layout>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        @foreach ($posts as $post)
            <article
                style="background: url('@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2022/01/08/14/53/town-6924142_960_720.jpg @endif')"
                class="h-96 bg-no-repeat rounded w-full object-cover bg-cover bg-center relative @if ($loop->first) md:col-span-2 @endif">
                <div class="absolute h-full w-full bg-black/40 pointer-events-none"></div>
                <div class="w-full h-full mx-auto px-10 flex flex-col z-10 justify-center align-center">
                    <div class="z-10">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}"
                                class="inline-block m-0 mb-2 rounded-full text-gray-200 font-semibold bg-{{ $tag->color }}-600 px-3 py-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <h1 class="text-3xl font-bold w-full text-gray-200 z-10">
                        <a href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach

    </div>
    <div class="my-10 mx-auto w-full">
        {{ $posts->links() }}
    </div>
</x-layouts.layout>
