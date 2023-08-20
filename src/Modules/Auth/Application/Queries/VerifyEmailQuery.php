<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Common\UseCases;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class VerifyEmailQuery extends UseCases
{
    public function __construct(private readonly IRegisterRepository $repository) { }

    public function execute(array $data): string
    {
        try {
            $user = $this->repository->getUserWithCode(new UserEntity($data));

            if (is_null($user)) return '1';

            if (!is_null($user->email_verified_at)) return '2';

            $this->repository->confirmUser($user);

            return '3';
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
