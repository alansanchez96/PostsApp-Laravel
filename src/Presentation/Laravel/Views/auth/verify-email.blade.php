<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" action="{{ route('verification.send') }}" class="w-3/4 md:w-7/12 flex flex-col items-center">
            @csrf

            <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">VERIFY EMAIL</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 last:mb-10">
                        {{ $error }}</p>
                @endforeach
            @endif


            <div class="w-3/4 mb-6">
                <p class="text-center text-gray-600 w-full">Porfavor verifica tu cuenta atraves de la verificacion que te
                    enviamos por email a tu direccion de correo electronico</p>
                <p class="text-center text-gray-600 w-full">Si no has recibido nuestro email, puedes volver a mandar la
                    verificacion atraves del siguiente boton</p>
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    SEND VERIFICATION
                </button>
            </div>

        </form>
    </div>
</x-layouts.layout>
