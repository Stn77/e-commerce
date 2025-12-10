<?php

namespace App\Infrastructure\User\Repositories;

use App\Application\User\Interfaces\UserRepositoryInterface;
use App\Domain\User\Entities\UserEntity;
use App\Infrastructure\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserEntity $entity): array
    {
        $user = User::create([
            'name' => $entity->name,
            'email' => $entity->email,
            'password' => $entity->password,
        ]);

        return $user->toArray();
    }

    public function findByEmail(string $email): ?array
    {
        $user = User::where('email', $email)->first();

        return $user?->toArray();
    }
}
