<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Profile;
use src\application\interfaces\ProfileInterface;

class InMemoryProfileRepository implements ProfileInterface
{
    private array $profiles = [];

    public function create(Profile $profile): Profile
    {
        $this->profiles[$profile->getId()] = $profile;

        return $profile;
    }

    public function findByName(string $profileName): Profile|null
    {
        foreach ($this->profiles as $profile) {
            if ($profile->getName() === $profileName) {
                return $profile;
            }
        }
        return null;
    }

    public function findById(int $id): Profile|null
    {
        return $this->profiles[$id] ?? null;
    }

    public function findManyProfiles(): array
    {
        return array_values($this->profiles) ?? [];
    }

    public function update(Profile $profile): Profile
    {
        $this->profiles[$profile->getId()] = $profile;

        return $profile;
    }
}
