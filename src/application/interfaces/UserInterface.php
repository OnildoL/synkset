<?php

namespace src\application\interfaces;

use src\application\entities\User;

interface UserInterface
{
    public function create(User $user): User;
    public function findByUsername(int|string $username): User|null;
    public function findById(int $id): User|null;
}
