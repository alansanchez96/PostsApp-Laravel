<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Queries\VerifyEmailQuery;
use Src\Modules\Auth\Infrastructure\Http\Request\CodeRequest;

class VerifyEmailController extends Controller
{
    public function __construct(private readonly VerifyEmailQuery $query) { }

    public function __invoke(CodeRequest $request)
    {
        $data = array();

        $data['code'] = $request->code;

        $response = $this->query->execute($data);

        return !is_null($response)
            ? redirect()
                ->intended(RouteServiceProvider::HOME)
                ->with('success', 'Haz verificado tu email correctamente')
            : redirect()
                ->route('verify.email')
                ->with('error', 'Verifica que el código sea correcto');
    }
}
