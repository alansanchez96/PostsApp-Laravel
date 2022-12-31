<x-layouts.layout>
    <div>
        <h1 class="my-5 font-bold text-4xl text-gray-700">{{ $post->title }}</h1>
        <p class="my-5 font-semibold text-gray-700">{!! $post->extract !!}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <figure>
                <img class="w-full h-80 object-cover object-center my-5"
                    src="@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2022/01/08/14/53/town-6924142_960_720.jpg @endif">
            </figure>

            <p class="text-base text-gray-700">{!! $post->body !!}</p>
        </div>

        <aside>
            <h3 class="text-2xl font-bold text-gray-600 my-5">Más en {{ $post->categories->name }}</h3>

            <ul>
                @foreach ($relatedPosts as $relatedPost)
                    <li class="mb-5">
                        <a class="flex items-center" href="{{ route('post.show', $relatedPost->slug) }}">
                            <img class="w-48 h-20 object-cover object-center"
                                src="@if ($relatedPost->image) {{ Storage::url($relatedPost->image->url) }} @else https://cdn.pixabay.com/photo/2022/01/08/14/53/town-6924142_960_720.jpg @endif"
                                alt="">
                            <p class="ml-2 w-full text-gray-700">{{ $relatedPost->title }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-layouts.layout>
