<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\DeleteTagUseCase;

class DeleteTag
{
    protected $deleteTag;

    public function __construct(DeleteTagUseCase $deleteTag)
    {
        $this->deleteTag = $deleteTag;
    }

    public function deleteTag(int $id)
    {
        return $this->deleteTag->execute($id);
    }
}
