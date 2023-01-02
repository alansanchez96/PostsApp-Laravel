<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
