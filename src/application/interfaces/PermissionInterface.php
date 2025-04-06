<?php

namespace src\application\interfaces;

use src\application\entities\Permission;

interface PermissionInterface
{
    public function create(Permission $permission): Permission;
    public function findByName(string $permissionName): Permission|null;
    public function findById(int $id): Permission|null;
}
