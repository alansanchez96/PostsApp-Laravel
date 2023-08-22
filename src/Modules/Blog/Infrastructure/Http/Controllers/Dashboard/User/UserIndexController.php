<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\User;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class UserIndexController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.user.index');
    }
}
