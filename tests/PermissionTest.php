<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\application\entities\Permission;
use src\application\usecases\PermissionUseCase;
use src\application\entities\errors\PermissionException;
use src\infrastructure\database\repositories\inMemory\InMemoryPermissionRepository;

class PermissionTest extends TestCase
{
    private InMemoryPermissionRepository $repository;
    private PermissionUseCase $permissionUseCase;
    private Permission $permission;

    protected function setUp(): void
    {
        $this->permission = new Permission("products", "Produtos", 1);
        $this->repository = new InMemoryPermissionRepository;
        $this->permissionUseCase = new PermissionUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->permission);
        unset($this->repository);
        unset($this->permissionUseCase);
    }

    public function testItShouldBeAbleToCreateaPermission()
    {
        $this->permissionUseCase->create($this->permission);

        $findByPermission = $this->repository->findById($this->permission->getId());

        $this->assertNotNull($findByPermission);
        $this->assertSame($this->permission->getId(), $findByPermission->getId());
    }

    public function testItShouldReturnNullIfPermissionDoesNotExist()
    {
        $nonExistentPermissionId = 9999;

        $findByPermission = $this->repository->findById($nonExistentPermissionId);

        $this->assertNull($findByPermission);
    }

    public function testItShouldNotBeAbleToRegisteraPermissionWithTheSamePermissionname()
    {
        $this->expectException(PermissionException::class);

        $this->permissionUseCase->create($this->permission);
        $this->permissionUseCase->create($this->permission);
    }
}
