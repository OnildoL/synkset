<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\Supplier;
use src\application\usecases\SupplierUseCase;
use src\application\entities\errors\SupplierException;
use src\infrastructure\database\repositories\inMemory\InMemorySupplierRepository;

class SupplierTest extends TestCase
{
    private InMemorySupplierRepository $repository;
    private SupplierUseCase $supplierUseCase;
    private Supplier $supplier;

    protected function setUp(): void
    {
        $this->supplier = new Supplier(
            "Tech Supplies LTDA",
            "Tech Supplies",
            "12345678901234",
            "123456789",
            "987654321",
            "contact@techsupplies.com",
            "11987654321",
            "Rua das Empresas",
            "100",
            "Sala 10",
            "Centro",
            "São Paulo",
            "SP",
            "01001000",
            true,
            new DateTimeImmutable(),
            1
        );
        $this->repository = new InMemorySupplierRepository;
        $this->supplierUseCase = new SupplierUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->supplier);
        unset($this->repository);
        unset($this->supplierUseCase);
    }

    public function testItShouldBeAbleToCreateaSupplier()
    {
        $this->supplierUseCase->create($this->supplier);

        $findBySupplier = $this->repository->findById($this->supplier->getId());

        $this->assertNotNull($findBySupplier);
        $this->assertSame($this->supplier->getId(), $findBySupplier->getId());
    }

    public function testItShouldReturnNullIfSupplierDoesNotExist()
    {
        $nonExistentSupplierId = 9999;

        $findBySupplier = $this->repository->findById($nonExistentSupplierId);

        $this->assertNull($findBySupplier);
    }

    public function testItShouldNotBeAbleToRegisteraSupplierWithTheSameSuppliername()
    {
        $this->expectException(SupplierException::class);

        $this->supplierUseCase->create($this->supplier);
        $this->supplierUseCase->create($this->supplier);
    }

    public function testItShouldBeAbleToListAllSuppliers()
    {
        $supplier1 = new Supplier("Alpha Supplies LTDA", "Alpha Supplies", "12345678000123", "123456789", "987654321", "contact@alphasupplies.com", "11987654321", "Rua das Indústrias", "200", "Bloco A", "Industrial", "Rio de Janeiro", "RJ", "20040030", true, new DateTimeImmutable(), 1);
        $supplier2 = new Supplier("Beta Supplies LTDA", "Beta Supplies", "98765432000198", "987654321", "123456789", "contact@betasupplies.com", "21987654321", "Avenida Central", "500", "Sala 20", "Centro", "Belo Horizonte", "MG", "30120010", true, new DateTimeImmutable(), 2);

        $this->supplierUseCase->create($supplier1);
        $this->supplierUseCase->create($supplier2);

        $suppliers = $this->supplierUseCase->findManySuppliers();

        $this->assertCount(2, $suppliers);
        $this->assertEquals("Alpha Supplies LTDA", $suppliers[0]->getCorporateName());
        $this->assertEquals("Beta Supplies LTDA", $suppliers[1]->getCorporateName());
    }

    public function testItShouldBeAbleToUpdateaSupplier()
    {
        $this->supplierUseCase->create($this->supplier);

        $updateSupplier = new Supplier("Alpha Supplies LTDA", "Alpha Supplies", "12345678000123", "123456789", "987654321", "contact@alphasupplies.com", "11987654321", "Rua das Indústrias", "200", "Bloco A", "Industrial", "Rio de Janeiro", "RJ", "20040030", true, new DateTimeImmutable(), 1);

        $this->supplierUseCase->update($updateSupplier);

        $this->assertEquals("12345678000123", $updateSupplier->getCnpj());
    }
}
