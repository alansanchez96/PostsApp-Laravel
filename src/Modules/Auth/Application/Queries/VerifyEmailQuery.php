<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Common\Traits\Logger;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class VerifyEmailQuery
{
    use Logger;

    public function __construct(private readonly IRegisterRepository $repository) { }

    public function execute(array $data)
    {
        try {
            $user = $this->repository->getUserWithCode(new UserEntity($data));

            $this->alreadyVerified($user);

            return !is_null($user) && isset($user->email_verified_at)
                ?   $this->repository->confirmUser($user)
                :   throw new \Exception('El codigo no es válido');
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    private function alreadyVerified(User $user)
    {
        if (!is_null($user->email_verified_at))
            throw new \Exception('El usuario ya está confirmado');
    }
}
