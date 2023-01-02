<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\SaveTagUseCase;

class SaveTag
{
    protected $saveTag;

    public function __construct(SaveTagUseCase $saveTag)
    {
        $this->saveTag = $saveTag;
    }

    public function saveTag($req, int $id = null)
    {
        $reqName = $this->getRequestName($req);
        $reqSlug = $this->getRequestSlug($req);
        $reqColor = $this->getRequestColor($req);

        return $this->saveTag->execute($reqName, $reqSlug, $reqColor, $id);
    }

    public function getRequestName($req)
    {
        return $req->name;
    }

    public function getRequestSlug($req)
    {
        return $req->slug;
    }

    public function getRequestColor($req)
    {
        return $req->color;
    }
}
