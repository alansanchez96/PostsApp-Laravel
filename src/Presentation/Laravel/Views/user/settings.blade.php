<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" class="w-full md:w-3/4 flex flex-col items-center" action="">
            @csrf
            @method('put')
            <h1 class="text-center text-2xl font-bold text-gray-600 my-10">CONFIGURACION DE LA CUENTA</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 first:mt-5 last:mb-10">{{ $error }}</p>
                @endforeach
            @endif

            @if (session('status'))
                <p class="text-center font-bold text-red-700 last:mb-10">
                    {{ session('status') }}
                </p>
            @endif

            <div class="w-3/4 mb-6">
                <label for="password_current" class="text-gray-600">Contraseña actual</label>
                <input type="password" name="password_current" id="password_current"
                    class="w-full py-2 px-4 mt-2 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Your current password...">
            </div>
            <div class="w-3/4 mb-6">
                <label for="password" class="text-gray-600">Nueva contraseña</label>
                <input type="password" name="password" id="password"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Your new password...">
            </div>
            <div class="w-3/4 mb-6">
                <label for="password_confirmation" class="text-gray-600">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full py-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Confirm password...">
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    GUARDAR CAMBIOS
                </button>
            </div>

        </form>
    </div>
</x-layouts.layout>
