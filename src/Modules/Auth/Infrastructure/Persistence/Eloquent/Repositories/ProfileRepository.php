<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Src\Common\Services\ImageService;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\IProfileRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class ProfileRepository extends BaseRepository implements IProfileRepository
{
    public function __construct(private readonly ImageService $imageService) { }

    /**
     * Manipulador de la Actualizacion de Informacion del usuario
     *
     * @param array $data
     * @return void
     */
    public function updateProfile(array $data): void
    {
        $entity = new UserEntity($data);

        try {
            $user = $this->getUser();

            if ($user->name !== $entity->name->getName())
                $this->updateName($user, $entity->name->getName());

            if ($user->email !== $entity->email->getEmail())
                $this->updateEmail($user, $entity->email->getEmail());

            if ($data['photo'])
                $this->imageService->update($user, 'users', $data['photo']);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * Manipulador para actualizar la contraseña del Usuario
     *
     * @param array $data
     * @return void
     */
    public function updateSettings(User $user, array $data): void
    {
        try {
            $this->updatePassword(
                $user,
                (new UserEntity($data))->password->getPassword()
            );
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * Actualiza el Email
     *
     * @param User $user
     * @param string $email
     * @return void
     */
    private function updateEmail(User $user, string $email): void
    {
        $user->update(['email' => $this->lower($email)]);
    }

    /**
     * Actualiza el Nombre
     *
     * @param User $user
     * @param string $name
     * @return void
     */
    private function updateName(User $user, string $name): void
    {
        $user->update(['name' => $this->capitalized($name)]);
    }

    /**
     * Actualiza la contraseña
     *
     * @param User $user
     * @param string $password
     * @return void
     */
    private function updatePassword(User $user, string $password)
    {
        $user->update(['password' => $this->stringHash($password)]);
    }

    /**
     * Retorna el usuario autenticado
     *
     * @return User
     */
    public function getUser(): User
    {
        return auth()->user();
    }
}
