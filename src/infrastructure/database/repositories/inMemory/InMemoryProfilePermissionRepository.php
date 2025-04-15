<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\interfaces\ProfilePermissionInterface;
use src\application\interfaces\PermissionInterface;

class InMemoryProfilePermissionRepository implements ProfilePermissionInterface
{
    private PermissionInterface $permissionRepository;
    private array $profilePermissions = [];

    public function __construct(PermissionInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function create(int $profileId, int $permissionId): void
    {
        $this->profilePermissions[] = [
            "profile_id" => $profileId,
            "permission_id" => $permissionId
        ];
    }

    public function findManyPermissionByProfile(int $profileId): array
    {
        $profilePermissions = array_filter($this->profilePermissions, function ($profilePermission) use ($profileId) {
            if ($profilePermission["profile_id"] === $profileId) {
                return $profilePermission;
            }
        });

        return array_map(fn($id) => $this->permissionRepository->findById($id["permission_id"]), $profilePermissions);
    }
}
