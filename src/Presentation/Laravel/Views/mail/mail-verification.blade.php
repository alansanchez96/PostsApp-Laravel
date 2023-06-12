<x-mail::message>
    Bienvenido a PostsApp

    Este es tu codigo de verificacion:

    {{ $user->code }}

    Thanks
    {{ config('app.name') }}
</x-mail::message>
