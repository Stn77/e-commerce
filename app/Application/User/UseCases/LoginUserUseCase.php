<?php

namespace App\Application\User\UseCases;

use App\Application\User\DTO\LoginData;
use App\Application\User\Interfaces\UserRepositoryInterface;
use App\Domain\User\Services\PasswordHasher;
use Exception;

class LoginUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $repository,
        private PasswordHasher $hasher
    ) {}

    public function execute(LoginData $data): array
    {
        $user = $this->repository->findByEmail($data->email);

        if (!$user || !$this->hasher->check($data->password, $user['password'])) {
            throw new Exception("Invalid email or password");
        }

        return $user;
    }
}
