<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\SaveCategoryUseCase;

class SaveCategory
{
    /**
     * Use case SaveCategory
     *
     * @var SaveCategoryUseCase
     */
    protected $saveCategory;

    public function __construct(SaveCategoryUseCase $saveCategory)
    {
        $this->saveCategory = $saveCategory;
    }

    /**
     * Separa por partes el request y envia los registros para ser guardados.
     *
     * @param $req
     * @param integer|null $id
     * @return void
     */
    public function saveCategory($req, int $id = null)
    {
        $reqName = $this->getRequestName($req);
        $reqSlug = $this->getRequestSlug($req);

        return $this->saveCategory->execute($reqName, $reqSlug, $id);
    }

    /**
     * Separa la propiedad name y lo devuelve por separado
     *
     * @param $req
     * @return mixed
     */
    public function getRequestName($req): mixed
    {
        return $req->name;
    }

    /**
     * Separa la propiedad slug y lo devuelve por separado
     *
     * @param $req
     * @return mixed
     */
    public function getRequestSlug($req): mixed
    {
        return $req->slug;
    }
}
