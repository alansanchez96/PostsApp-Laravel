<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\SaveTagUseCase;

class SaveTag
{
    /**
     * Use case SaveTag
     *
     * @var SaveTagUseCase
     */
    protected $saveTag;

    public function __construct(SaveTagUseCase $saveTag)
    {
        $this->saveTag = $saveTag;
    }

    /**
     * Recibe el request y lo separa.
     * Envia el request por separado y almacena los registros.
     *
     * @param mixed $req
     * @param integer|null $id
     * @return void
     */
    public function saveTag($req, ?int $id = null)
    {
        $reqName = $this->getRequestName($req);
        $reqSlug = $this->getRequestSlug($req);
        $reqColor = $this->getRequestColor($req);

        return $this->saveTag->execute($reqName, $reqSlug, $reqColor, $id);
    }

    /**
     * Separa la propiedad name y lo devuelve por separado
     *
     * @param $req
     * @return mixed
     */
    public function getRequestName($req)
    {
        return $req->name;
    }

    /**
     * Separa la propiedad slug y lo devuelve por separado
     *
     * @param $req
     * @return mixed
     */
    public function getRequestSlug($req)
    {
        return $req->slug;
    }

    /**
     * Separa la propiedad color y lo devuelve por separado
     *
     * @param $req
     * @return mixed
     */
    public function getRequestColor($req)
    {
        return $req->color;
    }
}
