<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class UserIndexController extends Controller
{
    /**
     * Retorna la vista con la lista de usuarios registrados
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.user.index');
    }
}
