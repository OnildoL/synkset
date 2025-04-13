<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\User;
use src\application\interfaces\UserInterface;

class InMemoryUserRepository implements UserInterface
{
    private array $users = [];

    public function create(User $user): User
    {
        $this->users[$user->getId()] = $user;

        return $user;
    }

    public function findByUsername(int|string $username): User|null
    {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }
        return null;
    }

    public function findById(int $id): User|null
    {
        return $this->users[$id] ?? null;
    }

    public function findManyUsers(): array
    {
        return array_values($this->users) ?? [];
    }

    public function update(User $user): User
    {
        $this->users[$user->getId()] = $user;

        return $user;
    }
}
