<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Application\Queries\LogoutQuery;

class LogOutController extends Controller
{
    public function __construct(private readonly LogoutQuery $logout) { }

    public function __invoke(): RedirectResponse
    {
        $this->logout->execute();

        return redirect()->route('post.index')->with('success', 'Haz cerrado sesión');
    }
}