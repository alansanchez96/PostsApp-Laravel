<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Src\Common\Services\ImageService;
use Src\Modules\Auth\Domain\Contracts\IProfileRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class ProfileRepository extends BaseRepository implements IProfileRepository
{
    private function __construct(private readonly ImageService $imageService) { }

    public function updateProfile(array $data): void
    {
        $entity = new UserEntity($data);

        $user = $this->getUser();

        if ($user->name !== $entity->name->getName())
            $this->updateName($user, $entity->name->getName());

        if ($user->email !== $entity->email->getEmail())
            $this->updateEmail($user, $entity->email->getEmail());

        if ($data['photo'])
            $this->imageService->update($user, 'users', $data['photo']);
    }

    private function getUser(): User
    {
        return auth()->user();
    }

    private function updateEmail(User $user, string $email): void
    {
        $user->update([
            'email' => $this->lower($email)
        ]);
    }

    private function updateName(User $user, string $name): void
    {
        $user->update([
            'name' => $this->capitalized($name)
        ]);
    }
}
