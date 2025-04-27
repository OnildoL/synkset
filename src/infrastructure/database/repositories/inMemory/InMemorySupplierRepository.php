<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Supplier;
use src\application\interfaces\SupplierInterface;

class InMemorySupplierRepository implements SupplierInterface
{
    private array $suppliers = [];

    public function create(Supplier $supplier): Supplier
    {
        $this->suppliers[$supplier->getId()] = $supplier;

        return $supplier;
    }

    public function findByCnpj(string $cnpj): Supplier|null
    {
        foreach ($this->suppliers as $supplier) {
            if ($supplier->getCnpj() === $cnpj) {
                return $supplier;
            }
        }
        return null;
    }

    public function findById(int $id): Supplier|null
    {
        return $this->suppliers[$id] ?? null;
    }

    public function findManySuppliers(): array
    {
        return array_values($this->suppliers) ?? [];
    }

    public function update(Supplier $supplier): Supplier
    {
        $this->suppliers[$supplier->getId()] = $supplier;

        return $supplier;
    }
}
