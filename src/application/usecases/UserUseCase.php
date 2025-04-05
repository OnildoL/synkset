<?php

namespace src\application\usecases;

use src\application\entities\User;
use src\application\interfaces\UserInterface;
use src\application\entities\errors\UserException;

class UserUseCase
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function create(User $user): User
    {
        $userExist = $this->userInterface->findByUsername($user->getUsername());

        if ($userExist) {
            throw new UserException("Já existe usuário registrado com esse username.");
        }

        $result = $this->userInterface->create($user);

        return $result;
    }
}
