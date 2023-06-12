<x-layouts.layout>
    <div class="flex justify-center h-screen items-center mx-auto">
        <form method="post" class="w-full md:w-3/4 flex flex-col items-center" action="{{ route('user.updateProfile') }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <h1 class="text-center text-2xl font-bold text-gray-600 my-10">EDITAR PERFIL</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-center font-bold text-red-700 first:mt-5 last:mb-10">{{ $error }}</p>
                @endforeach
            @endif

            @if (session('status'))
                <p class="text-center font-bold text-green-600 last:mb-10">
                    {{ session('status') }}
                </p>
            @endif

            <div class="w-3/4 mb-6">
                <label for="name" class="text-gray-600">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full py-2 px-4 mt-2 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Write your name..." value="{{ old('name', auth()->user()->name) }}">
            </div>
            <div class="w-3/4 mb-6">
                <label for="email" class="text-gray-600">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full py-2 mt-2 px-4 bg-gray-300 rounded border hover:border-gray-900 focus:outline-none border-gray-800"
                    placeholder="Write your email..." value="{{ old('email', auth()->user()->email) }}">
            </div>
            <div class="w-3/4 mb-6">
                <label for="file" class="text-gray-600">Profile Picture</label>
                <input type="file" name="photo" id="file"
                    class="w-full py-2 mt-2 px-4 bg-gray-200 rounded border-r-2 border-l-2 hover:border-gray-900 focus:outline-none border-gray-800"
                    accept="image/jpeg, image/png">
            </div>

            <div class="w-3/4 mt-4">
                <button type="submit" class="py-4 bg-gray-800 w-full rounded text-blue-50 font-bold hover:bg-gray-900">
                    GUARDAR CAMBIOS
                </button>
            </div>

        </form>
    </div>
</x-layouts.layout>
