<?php

namespace App\Domain\User\Services;

use Illuminate\Support\Facades\Hash;

class PasswordHasher
{
    public function hash(string $password): string
    {
        return Hash::make($password);
    }

    public function check(string $password, string $hashed): bool
    {
        return Hash::check($password, $hashed);
    }
}
