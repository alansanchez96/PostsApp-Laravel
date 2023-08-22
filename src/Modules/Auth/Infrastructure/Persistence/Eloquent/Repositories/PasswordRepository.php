<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Illuminate\Support\Facades\Hash;
use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Password;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;
use Src\Modules\Auth\Infrastructure\Exceptions\UserException;
use Src\Modules\Auth\Infrastructure\Jobs\SendResetLink;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class PasswordRepository extends BaseRepository implements IPasswordRepository
{
    public function sendResetLink(UserEntity $entity): void
    {
        try {
            $user = User::where('email', $entity->email->getEmail())->first();
            
            $user->token = $this->randomCode(60);

            $user->save();

            SendResetLink::dispatch($user);

        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function createNewPassword(UserEntity $entity): ?User
    {
        try {
            $user = User::where('email', $entity->email->getEmail())
                    ->where('token', $entity->token->getToken())
                    ->first();

            if (is_null($user))
                return null;

            if (Hash::check($entity->password->getPassword(), $user->password))
                throw new UserException('Estas utilizando una contraseña antigua');

            setcookie('token', '', time() - 3600, '/');

            $user->update([
                'password' => $this->stringHash($entity->password->getPassword()),
                'token' => null
            ]);

            return $user;
        } catch (UserException $e) {
            $this->catch($e->getMessage());
            session()->flash('password.repeat', $e->getMessage());
            return null;
        }
    }
}
