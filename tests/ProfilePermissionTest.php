<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\application\entities\Profile;
use src\application\entities\Permission;
use src\infrastructure\database\repositories\inMemory\InMemoryProfileRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryPermissionRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryProfilePermissionRepository;

class ProfilePermissionTest extends TestCase
{
    private InMemoryProfileRepository $profileRepository;
    private InMemoryPermissionRepository $permissionRepository;
    private InMemoryProfilePermissionRepository $profilePermissionRepository;

    protected function setUp(): void
    {
        $this->profileRepository = new InMemoryProfileRepository;
        $this->permissionRepository = new InMemoryPermissionRepository;
        $this->profilePermissionRepository = new InMemoryProfilePermissionRepository($this->permissionRepository);

        $this->profileRepository->create(new Profile("Administrador", 1));
        $this->permissionRepository->create(new Permission("products", "Produtos", 1));
        $this->permissionRepository->create(new Permission("notes", "Notas", 2));
    }

    public function testItShouldLinkPermissionToProfile()
    {
        $profile = $this->profileRepository->findById(1);

        $this->assertNotNull($profile);

        $permission1 = $this->permissionRepository->findByName("products");
        $permission2 = $this->permissionRepository->findByName("notes");

        $this->assertNotNull($permission1);
        $this->assertNotNull($permission2);

        $this->profilePermissionRepository->create($profile->getId(), $permission1->getId());
        $this->profilePermissionRepository->create($profile->getId(), $permission2->getId());

        $profilePermissions = $this->profilePermissionRepository->findManyPermissionByProfile($profile->getId());

        $this->assertCount(2, $profilePermissions);
    }
}
