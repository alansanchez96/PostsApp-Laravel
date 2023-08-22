<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\SaveTagCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\TagRequest;

class TagStoreController extends Controller
{
    public function __construct(private readonly SaveTagCommand $command) { }

    /**
     * Valida los requisitos del Request.
     * Crea un nuevo registro de TagModel y lo almacena
     * Redirecciona a la ruta designada.
     *
     * @param TagRequest $request
     * @return Redirector|RedirectResponse
     */
    public function __invoke(TagRequest $request): Redirector|RedirectResponse
    {
        $data = [
            'name'  =>  $request->name,
            'color' =>  $request->color
        ];

        $this->command->execute($data);

        return redirect()->route('admin.tag.index')->with('create', 'La etiqueta se creó con éxito');
    }
}
