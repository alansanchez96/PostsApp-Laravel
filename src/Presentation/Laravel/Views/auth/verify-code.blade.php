<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" action="{{ route('verification.code') }}" class="w-3/4 md:w-7/12 flex flex-col items-center">
            @csrf

            <h1 class="text-center text-2xl font-bold text-gray-600 uppercase mb-6">Verify your email</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 last:mb-10">
                        {{ $error }}</p>
                @endforeach
            @endif

            @if (session('error'))
                <p class="text-center font-bold text-red-700 mb-10">
                    {{ session('error') }}
                </p>
            @endif

            @if (session('status'))
                <p class="text-center font-bold text-green-600 mb-10">
                    {{ session('status') }}
                </p>
            @endif

            <div class="w-3/4 mb-6">
                <input type="text" name="code"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Insert code">
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit"
                    class="py-4 bg-gray-800 uppercase w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    verify
                </button>
            </div>

            <div class="w-3/4 mt-4 mx-auto text-center">
                <a class="text-gray-600 mx-auto" href="{{ route('verify.email') }}">¿No tienes tu código? ¡Recíbelo
                    aquí!</a>
            </div>

        </form>
    </div>
</x-layouts.layout>
