<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Permission;
use src\application\interfaces\PermissionInterface;

class InMemoryPermissionRepository implements PermissionInterface
{
    private array $permissions = [];

    public function create(Permission $permission): Permission
    {
        $this->permissions[$permission->getId()] = $permission;

        return $permission;
    }

    public function findByName(string $permissionName): Permission|null
    {
        foreach ($this->permissions as $permission) {
            if ($permission->getName() === $permissionName) {
                return $permission;
            }
        }
        return null;
    }

    public function findById(int $id): Permission|null
    {
        return $this->permissions[$id] ?? null;
    }
}
