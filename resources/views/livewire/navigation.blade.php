<nav class="bg-gray-800" x-data="{ mobileMenu: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" x-on:click="mobileMenu=true"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <!--
              Icon when menu is closed.
  
              Heroicon name: outline/bars-3
  
              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
              Icon when menu is open.
  
              Heroicon name: outline/x-mark
  
              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex flex-shrink-0 items-center cursor-pointer">
                    <p class="block text-white font-bold w-auto lg:hidden hover:text-gray-200">PostApp@Laravel</p>
                    <p class="hidden w-auto font-bold text-white lg:block hover:text-gray-200">PostApp@Laravel</p>
                </a>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        @foreach ($categories as $category)
                            <a href="{{ route('post.category', $category->slug) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <span class="text-gray-200 mr-3">{{ auth()->user()->name }}</span>
                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ btnProfile: false }">
                        {{-- Button Profile --}}
                        <div>
                            <button x-on:click="btnProfile=true" type="button"
                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="sr-only">Open user menu</span>
                                @if (auth()->user()->image)
                                    <img src="{{ Storage::url(auth()->user()->image->url) }}" alt=""
                                        class="h-8 w-8 rounded-full">
                                @else
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png"
                                        alt="">
                                @endif
                            </button>
                        </div>

                        {{-- ModalOptionsProfile --}}
                        <div x-show="btnProfile" x-on:click.away="btnProfile=false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            @can('admin.dashboard')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 hover:text-gray-900 hover:bg-gray-300 py-2 text-sm text-gray-700">Dashboard</a>
                            @endcan

                            <a href="{{ route('user.profile') }}"
                                class="block px-4 hover:text-gray-900 hover:bg-gray-300 py-2 text-sm text-gray-700">Your
                                Profile</a>
                            <a href="{{ route('user.settings') }}"
                                class="block px-4 hover:text-gray-900 hover:bg-gray-300 py-2 text-sm text-gray-700">Settings</a>
                            <form action="/logout" method="post">
                                @csrf
                                <a class="cursor-pointer hover:text-gray-900 hover:bg-gray-300 block px-4 py-2 text-sm text-gray-700"
                                    onclick="this.closest('form').submit()">Log out</a>
                            </form>

                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="{{ route('register') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
            @endauth


        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" x-show="mobileMenu" x-on:click.away="mobileMenu=false">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            @foreach ($categories as $category)
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
