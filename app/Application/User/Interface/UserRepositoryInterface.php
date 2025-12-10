<?php

namespace App\Application\User\Interfaces;

use App\Domain\User\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function create(UserEntity $user): array;
    public function findByEmail(string $email): ?array;
}
