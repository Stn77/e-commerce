<?php

namespace App\Application\User\UseCases;

use App\Application\User\DTO\RegisterData;
use App\Application\User\Interfaces\UserRepositoryInterface;
use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Services\PasswordHasher;

class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $repository,
        private PasswordHasher $hasher
    ) {}

    public function execute(RegisterData $data): array
    {
        $userEntity = new UserEntity(
            name: $data->name,
            email: $data->email,
            password: $this->hasher->hash($data->password),
        );

        return $this->repository->create($userEntity);
    }
}
