<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Password;
use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;

class PasswordRepository extends BaseRepository implements IPasswordRepository
{
    public function sendResetLink(array $credential): string
    {
        try {
            return Password::sendResetLink($credential);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function createNewPassword(UserEntity $entity, array $credentials): ?string
    {
        try {
            return Password::reset(
                $credentials,
                fn ($user) => $user->forceFill([
                    'password' => $this->stringHash($entity->password->getPassword()),
                    'remember_token' => $this->randomCode(60)
                ])->save()
            );
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
