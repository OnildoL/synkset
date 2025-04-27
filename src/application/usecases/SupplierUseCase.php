<?php

namespace src\application\usecases;

use src\application\entities\Supplier;
use src\application\interfaces\SupplierInterface;
use src\application\entities\errors\SupplierException;

class SupplierUseCase
{
    private SupplierInterface $supplierInterface;

    public function __construct(SupplierInterface $supplierInterface)
    {
        $this->supplierInterface = $supplierInterface;
    }

    public function create(Supplier $supplier): Supplier
    {
        $supplierExist = $this->supplierInterface->findByCnpj($supplier->getCnpj());

        if ($supplierExist) {
            throw new SupplierException("Já existe empresa registrada com esse cnpj.");
        }

        $result = $this->supplierInterface->create($supplier);

        return $result;
    }


    public function findManySuppliers(): array
    {
        return $this->supplierInterface->findManySuppliers();
    }

    public function update(Supplier $supplier): Supplier
    {
        $supplierExist = $this->supplierInterface->findById($supplier->getId());

        if (!$supplierExist) {
            throw new SupplierException("Fornecedor não encontrado.");
        }

        return $this->supplierInterface->update($supplier);
    }
}
