<?php

namespace src\application\interfaces;

use src\application\entities\Profile;

interface ProfileInterface
{
    public function create(Profile $profile): Profile;
    public function findByName(string $profileName): Profile|null;
    public function findById(int $id): Profile|null;
    public function findManyProfiles(): array;
    public function update(Profile $profile): Profile;
}
