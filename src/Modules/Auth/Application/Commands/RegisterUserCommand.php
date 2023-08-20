<?php

namespace Src\Modules\Auth\Application\Commands;

use Illuminate\Support\Facades\Auth;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Jobs\RegisteredUser;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;
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
        $user = $this->repository->save(new UserEntity($data));

        $this->notifyUserRegistered($user);
        $this->authenticate($user);
    }
    
    public function sendEmail()
    {
        $user = auth()->user();

        $this->notifyUserRegistered($user);
    }

    /**
     * En segundo plano envía un Email al usuario registrado
     *
     * @param User $user
     * @return void
     */
    private function notifyUserRegistered(User $user): void
    {
        RegisteredUser::dispatch($user);
    }

    /**
     * Logea al usuario recientemente registrado
     *
     * @param User $user
     * @return void
     */
    private function authenticate(User $user): void
    {
        Auth::login($user);
    }
}
