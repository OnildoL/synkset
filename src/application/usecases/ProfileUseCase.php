<?php

namespace src\application\usecases;

use src\application\entities\Profile;
use src\application\interfaces\ProfileInterface;
use src\application\entities\errors\ProfileException;

class ProfileUseCase
{
    private ProfileInterface $profileInterface;

    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;
    }

    public function create(Profile $profile): Profile
    {
        $profileExist = $this->profileInterface->findByName($profile->getName());

        if ($profileExist) {
            throw new ProfileException("Já existe perfil registrado com esse nome.");
        }

        $result = $this->profileInterface->create($profile);

        return $result;
    }
}
