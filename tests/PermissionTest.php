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

    protected function setUp(): void
    {
        $this->repository = new InMemoryPermissionRepository;
        $this->permissionUseCase = new PermissionUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->permissionUseCase);
    }

    public function testItShouldBeAbleToCreateaPermission()
    {
        $permission = new Permission("products", "Produtos", 1);

        $this->permissionUseCase->create($permission);

        $findByPermission = $this->repository->findById($permission->getId());

        $this->assertNotNull($findByPermission);
        $this->assertSame($permission->getId(), $findByPermission->getId());
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

        $permission = new Permission("products", "Produtos", 1);

        $this->permissionUseCase->create($permission);
        $this->permissionUseCase->create($permission);
    }
}
