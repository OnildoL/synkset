<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\errors\UserException;
use src\application\entities\User;
use src\application\interfaces\UserInterface;

class InMemoryUserRepository implements UserInterface
{
    private array $users = [];

    public function create(User $user): void
    {
        $userExist = $this->findByUsername($user->getUsername());

        if ($userExist) {
            throw new UserException("Já existe usuário registrado com esse username.");
        }

        $this->users[$user->getId()] = $user;
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
}
