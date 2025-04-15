<?php

namespace src\application\interfaces;

interface ProfilePermissionInterface
{
    public function create(int $profileId, int $permissionId): void;
    public function findManyPermissionByProfile(int $profileId): array;
}
