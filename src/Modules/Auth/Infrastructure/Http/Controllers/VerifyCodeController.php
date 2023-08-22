<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Application\Queries\VerifyEmailQuery;
use Src\Modules\Auth\Infrastructure\Http\Request\CodeRequest;

class VerifyCodeController extends Controller
{
    public function __construct(private readonly VerifyEmailQuery $query) { }

    /**
     * Obtiene el codigo de activacion
     * Envia la informacion, obtiene una respuesta y redirecciona
     *
     * @param CodeRequest $request
     * @return Redirector|RedirectResponse
     */
    public function __invoke(CodeRequest $request): Redirector|RedirectResponse
    {
        $data = ['code' => $request->code];

        $response = $this->query->execute($data);

        switch ($response) {
            case '1':
                return redirect()->back()->withErrors(['error_code' => 'El codigo no es correcto']);
                break;
            case '2':
                return redirect()->back()->withErrors(['account_active' => 'Tu cuenta ya está activa']);
                break;
            case '3':
                return redirect('/')->with('success', 'Tu cuenta ha sido activada');
                break;
        }
    }
}
