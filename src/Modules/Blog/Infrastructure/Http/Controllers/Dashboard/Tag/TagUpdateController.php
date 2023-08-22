<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\UpdateTagCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\TagRequest;

class TagUpdateController extends Controller
{
    public function __construct(private readonly UpdateTagCommand $command) { }

    /**
     * Valida los requisitos del Request.
     * Actualiza el registro del TagModel almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param TagRequest $request
     * @param integer $tag
     * @return Redirector|RedirectResponse
     */
    public function __invoke(TagRequest $request, int $tag): Redirector|RedirectResponse
    {
        $data = [
            'id'    => !is_int($tag) ? (int) $tag : (string) $tag,
            'name'  => $request->name,
            'color' => $request->color
        ];

        $this->command->execute($data);

        return redirect()->route('admin.tag.index')->with('update', 'La etiqueta se actualizó con éxito');
    }
}
