<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\IncomingInvoice;
use src\application\interfaces\IncomingInvoiceInterface;

class InMemoryIncomingInvoiceRepository implements IncomingInvoiceInterface
{
    private array $incominginvoices = [];

    public function create(IncomingInvoice $incominginvoice): IncomingInvoice
    {
        $this->incominginvoices[$incominginvoice->getId()] = $incominginvoice;

        return $incominginvoice;
    }

    public function findById(int $id): IncomingInvoice|null
    {
        return $this->incominginvoices[$id] ?? null;
    }

    public function findByCompanyId(int $companyId): array
    {
        foreach ($this->incominginvoices as $incominginvoice) {
            if ($incominginvoice->getCompanyId() === $companyId) {
                return $incominginvoice;
            }
        }
        return [];
    }

    public function findBySupplierId(int $supplierId): array
    {
        foreach ($this->incominginvoices as $incominginvoice) {
            if ($incominginvoice->getSupplierId() === $supplierId) {
                return $incominginvoice;
            }
        }
        return [];
    }

    public function findByAccessKey(string $accessKey): IncomingInvoice|null
    {
        foreach ($this->incominginvoices as $incominginvoice) {
            if ($incominginvoice->getAccessKey() === $accessKey) {
                return $incominginvoice;
            }
        }
        return null;
    }

    public function findManyIncomingInvoices(): array
    {
        return array_values($this->incominginvoices) ?? [];
    }

    public function update(IncomingInvoice $incominginvoice): IncomingInvoice
    {
        $this->incominginvoices[$incominginvoice->getId()] = $incominginvoice;

        return $incominginvoice;
    }
}
