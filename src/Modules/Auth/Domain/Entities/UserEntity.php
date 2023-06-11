<?php

namespace Src\Modules\Auth\Domain\Entities;

use Src\Common\Domain\AggregateRoot;
use Src\Modules\Auth\Domain\ValueObjects\{UserId, UserName, UserEmail, UserPassword};

class UserEntity extends AggregateRoot
{
    public ?UserId $id;
    public UserName $name;
    public UserEmail $email;
    public UserPassword $password;

    public function __construct(array $arguments)
    {
        $this->id = $arguments['id'] ?? null;
        $this->name = new UserName($arguments['name'] ?? '');
        $this->email = new UserEmail($arguments['email'] ?? '');
        $this->password = new UserPassword($arguments['password'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
