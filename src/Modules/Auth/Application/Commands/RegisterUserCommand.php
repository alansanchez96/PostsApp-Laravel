<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\ValueObjects\{UserName, UserEmail, UserPassword};

class RegisterUserCommand
{
    /**
     * Inicializa la comunicacion
     *
     * @param IRegisterRepository $repository
     */
    public function __construct(private readonly IRegisterRepository $repository) { }

    /**
     * Manda la peticion al Repositorio
     *
     * @param array $data
     * @return void
     */
    public function registerAUser(array $data)
    {
        $this->repository->registerAndNotify(new UserEntity($data));
    }
}
