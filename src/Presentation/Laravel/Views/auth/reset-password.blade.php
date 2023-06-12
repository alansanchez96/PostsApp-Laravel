<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" action="{{ route('password.update') }}" class="w-3/4 md:w-7/12 flex flex-col items-center">
            @csrf

            <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">RESET PASSWORD</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 last:mb-10">{{ $error }}</p>
                @endforeach
            @endif

            <div class="w-3/4 mb-6">
                <p class="text-center text-gray-600 w-full">Introduce la nueva contraseña para tu cuenta</p>
            </div>
            <div class="w-3/4 mb-6">
                <input type="email" name="email"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 disabled:bg-zinc-400 disabled:text-gray-800 focus:outline-none border-gray-800"
                    placeholder="Enter your email" value="{{ old('email', $request->email) }}" required>
            </div>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="w-3/4 mb-6">
                <input type="password" name="password"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Enter your new password" autofocus required>
            </div>
            <div class="w-3/4 mb-6">
                <input type="password" name="password_confirmation"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Confirm password" required>
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    RESET
                </button>
            </div>

        </form>
    </div>
</x-layouts.layout>
