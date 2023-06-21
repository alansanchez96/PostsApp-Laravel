<x-mail::message>
    Ingresa al siguiente enlace para restablecer tu contraseña

    <a href="{!! route('password.reset', ['token' => $user->token, 'email' => $user->email]) !!}">Restablecer Password</a>

    Thanks
    {{ config('app.name') }}
</x-mail::message>
