<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Application\Commands\UpdateProfileCommand;
use Src\Modules\Auth\Infrastructure\Http\Request\UserInfoRequest;
    
class UpdateProfileController extends Controller
{
    public function __construct(private readonly UpdateProfileCommand $command) { }

    public function __invoke(UserInfoRequest $request): RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $request->file('photo'),
        ];

        $this->command->handle($data);

        return back()->with('success', 'Datos actualizados correctamente');
    }
}