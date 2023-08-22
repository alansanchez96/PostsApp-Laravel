<nav class="bg-gray-800 border-gray-200 ">
    <div class="flex flex-wrap items-center justify-between mx-auto max-w-7xl px-2 py-4 shadow-lg  sm:px-6 lg:px-8">
        <a href="/" class="flex items-center">
            <span class="self-center text-2xl font-semibold text-gray-300 whitespace-nowrap">PostsApp@Laravel</span>
        </a>
        <div class="flex lg:order-2">

            @auth
                <div class="flex items-center md:order-2">
                    <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-2 focus:ring-gray-500"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        @if (auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image->url) }}" alt=""
                                class="h-10 w-10 rounded-full">
                        @else
                            <img class="h-8 w-8 rounded-full"
                                src="https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png"
                                alt="">
                        @endif
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none px-4 pb-4 bg-gray-800 border border-gray-500 divide-y divide-gray-500 rounded-lg shadow-lg"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-300 font-bold uppercase">{{ auth()->user()->name }}</span>
                            <span class="block text-sm  text-gray-400 truncate">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-300 hover:text-gray-800 rounded">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('user.profile') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-300 hover:text-gray-800 rounded">Perfil</a>
                            </li>
                            <li>
                                <a href="{{ route('user.settings') }}"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-300 hover:text-gray-800 rounded">Configuracion</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <a onclick="this.closest('form').submit()"
                                        class="cursor-pointer block px-4 py-2 text-sm text-gray-300 hover:bg-gray-300 hover:text-red-600 rounded">
                                        Cerrar sesion
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="flex justify-between text-white font-bold gap-3">
                    <a href="{{ route('login') }}"
                        class="text-gray-300 hover:bg-gray-300 hover:text-gray-800 uppercase px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-300 hover:bg-gray-300 hover:text-gray-800 uppercase px-3 py-2 rounded-md text-sm font-medium">Register</a>
                </div>
            @endauth
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden flex-col w-full lg:flex lg:w-auto" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 lg:p-0 mt-4 lg:mt-0 rounded-lg bg-gray-700 lg:bg-transparent lg:flex-row lg:space-x-8">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('post.category', $category->slug) }}"
                            class="text-gray-300 w-full block text-center uppercase hover:bg-gray-300 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
