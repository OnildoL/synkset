<?php

namespace src\application\interfaces;

use src\application\entities\Supplier;

interface SupplierInterface
{
    public function create(Supplier $supplier): Supplier;
    public function findByCnpj(string $cnpj): Supplier|null;
    public function findById(int $id): Supplier|null;
    public function findManySuppliers(): array;
    public function update(Supplier $supplier): Supplier;
}
