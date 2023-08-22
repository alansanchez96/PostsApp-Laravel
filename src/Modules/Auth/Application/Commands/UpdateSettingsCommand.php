<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Common\UseCases;
use Src\Common\Exceptions\InvalidPasswordException;
use Src\Modules\Auth\Domain\Contracts\IProfileRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class UpdateSettingsCommand extends UseCases
{
    public function __construct(private readonly IProfileRepository $repository) { }

    public function handle(array $data): bool|string
    {
        try {
            $user = $this->repository->getUser();

            $this->verifiedPasswords($user, $data);
    
            $this->repository->updateSettings($user, $data);

            return true;
        } catch (InvalidPasswordException $e) {
            $this->catch($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Validador de contraseñas
     *
     * @param User $user
     * @param array $data
     * @return void
     */
    private function verifiedPasswords(User $user, array $data)
    {
        if (!password_verify($data['password_current'], $user->password))
            $this->invalidPasswords();

        if ($data['password_current'] === $data['password_confirmation'])
            $this->invalidPasswords();
    }

    private function invalidPasswords()
    {
        throw new InvalidPasswordException('Verifica bien los campos de contraseña');
    }
}
