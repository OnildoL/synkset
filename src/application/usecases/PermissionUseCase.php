<?php

namespace src\application\usecases;

use src\application\entities\Permission;
use src\application\interfaces\PermissionInterface;
use src\application\entities\errors\PermissionException;

class PermissionUseCase
{
    private PermissionInterface $permissionInterface;

    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }

    public function create(Permission $permission): Permission
    {
        $permissionExist = $this->permissionInterface->findByName($permission->getName());

        if ($permissionExist) {
            throw new PermissionException("Já existe permissão registrada com esse nome.");
        }

        $result = $this->permissionInterface->create($permission);

        return $result;
    }

    public function findManyPermissions(): array
    {
        return $this->permissionInterface->findManyPermissions();
    }

    public function update(Permission $permission): Permission
    {
        $permissionExist = $this->permissionInterface->findById($permission->getId());

        if (!$permissionExist) {
            throw new PermissionException("Permissão não encontrada.");
        }

        return $this->permissionInterface->update($permission);
    }
}
