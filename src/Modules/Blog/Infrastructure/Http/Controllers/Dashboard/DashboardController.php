<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.index');
    }
}
