<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" class="w-3/4 md:w-7/12 flex flex-col items-center">
            @csrf

            <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">RESET PASSWORD</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 last:mb-10">
                        {{ $error }}
                    </p>
                @endforeach
            @endif
            @if (session('status'))
                <p class="text-center font-bold text-green-600 last:mb-10">
                    {{ session('status') }}
                </p>
            @endif


            <div class="w-3/4 mb-6">
                <p class="text-center text-gray-600 w-full">Si has olvidado con tu password, ingresa tu <span
                        class="font-bold">Email</span> para poder enviarte las instrucciones a tu dirección de correo
                    electronico asociado a tu cuenta y poder continuar con el proceso de la solicitud</p>
            </div>
            <div class="w-3/4 mb-6">
                <input type="email" name="email"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Your Email">
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    CONTINUE
                </button>
            </div>

        </form>
    </div>
</x-layouts.layout>
