<x-layouts.layout>
    <div class="flex justify-center h-screen w-screen items-center">
        <form method="post" class="w-full md:w-1/2 flex flex-col items-center ">
            @csrf

            <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">LOG IN</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 mb-5">{{ $error }}</p>
                @endforeach
            @endif

            <div class="w-3/4 mb-6">
                <input type="email" name="email"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Username">
            </div>

            <div class="w-3/4 mb-6">
                <input type="password" name="password"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Password">
            </div>

            <div class="w-3/4 flex flex-row justify-between">
                <div class=" flex items-center gap-x-1">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4">
                    <label for="remember" class="text-sm text-gray-800">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-sm text-gray-800 hover:text-gray-900">Forgot?</a>
                </div>
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    LOGIN
                </button>
            </div>
        </form>
    </div>
</x-layouts.layout>