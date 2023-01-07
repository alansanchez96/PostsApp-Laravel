<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\DeleteTagUseCase;

class DeleteTag
{
    /**
     * Use case DeleteTag
     *
     * @var DeleteTagUseCase
     */
    protected $deleteTag;

    public function __construct(DeleteTagUseCase $deleteTag)
    {
        $this->deleteTag = $deleteTag;
    }

    /**
     * Recibe el ModelTag y devuelve la eliminacion del registro
     *
     * @param integer $id
     * @return void
     */
    public function deleteTag(int $id)
    {
        return $this->deleteTag->execute($id);
    }
}
