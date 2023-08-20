<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Queries\VerifyEmailQuery;
use Src\Modules\Auth\Infrastructure\Http\Request\CodeRequest;

class VerifyCodeController extends Controller
{
    public function __construct(private readonly VerifyEmailQuery $query) { }

    public function __invoke(CodeRequest $request)
    {
        $data = array();

        $data['code'] = $request->code;

        $response = $this->query->execute($data);

        switch ($response) {
            case '1':
                return redirect()->back()->with('error', 'El codigo no es correcto');
                break;
            case '2':
                return redirect()->back()->with('error', 'Tu cuenta ya está activa');
                break;
            case '3':
                return redirect('/')->with('verified', 'Tu cuenta ha sido activada');
                break;
        }
    }
}
