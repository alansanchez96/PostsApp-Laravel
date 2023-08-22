<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Common\UseCases;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class NewPasswordCommand extends UseCases
{
    public function __construct(private readonly IPasswordRepository $repository) { }

    /**
     * @param array $credentials
     * @throws EntityNotFoundException
     * @return User|null
     */
    public function execute(array $credentials): ?User
    {
        try {
            $user = $this->repository->createNewPassword(new UserEntity($credentials));

            return !is_null($user)
                ?   $user
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
            return null;
        }
    }
}
