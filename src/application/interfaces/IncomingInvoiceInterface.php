<?php

namespace src\application\interfaces;

use src\application\entities\IncomingInvoice;

interface IncomingInvoiceInterface
{
    public function create(IncomingInvoice $incominginvoice): IncomingInvoice;
    public function findById(int $id): IncomingInvoice|null;
    public function findByCompanyId(int $companyId): array;
    public function findBySupplierId(int $supplierId): array;
    public function findByAccessKey(string $accessKey): IncomingInvoice|null;
    public function findManyIncomingInvoices(): array;
    public function update(IncomingInvoice $incominginvoice): IncomingInvoice;
}
