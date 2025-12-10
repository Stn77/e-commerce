<?php

namespace App\Application\User\DTO;

class RegisterData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
