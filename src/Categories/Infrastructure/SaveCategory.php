<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\SaveCategoryUseCase;

class SaveCategory
{
    protected $saveCategory;

    public function __construct(SaveCategoryUseCase $saveCategory)
    {
        $this->saveCategory = $saveCategory;
    }

    public function saveCategory($req, int $id = null)
    {
        $reqName = $this->getRequestName($req);
        $reqSlug = $this->getRequestSlug($req);

        return $this->saveCategory->execute($reqName, $reqSlug, $id);
    }

    public function getRequestName($req)
    {
        return $req->name;
    }

    public function getRequestSlug($req)
    {
        return $req->slug;
    }
}
