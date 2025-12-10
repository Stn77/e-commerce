<?php

namespace App\Application\User\DTO;

class LoginData
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
