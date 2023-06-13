<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Common\UseCases;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\ILoginRepository;

class LoginUserQuery extends UseCases
{
    public function __construct(private readonly ILoginRepository $repository) { }

    /**
     * Intenta logear al usuario o retorna una exception
     *
     * @param array $data
     * @return boolean
     */
    public function login(array $data): bool
    {
        try {
            $response = $this->repository->attemptLogin(new UserEntity($data));
    
            return $response
                ?   $response
                :   throw new \InvalidArgumentException('Invalid credentials', 401);
        } catch (\InvalidArgumentException $e) {
            $this->catch($e->getMessage());
        }
    }
}
