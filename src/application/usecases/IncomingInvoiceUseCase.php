<?php

namespace src\application\usecases;

use src\application\entities\IncomingInvoice;
use src\application\interfaces\IncomingInvoiceInterface;
use src\application\entities\errors\IncomingInvoiceException;

class IncomingInvoiceUseCase
{
    private IncomingInvoiceInterface $incominginvoiceInterface;

    public function __construct(IncomingInvoiceInterface $incominginvoiceInterface)
    {
        $this->incominginvoiceInterface = $incominginvoiceInterface;
    }

    public function create(IncomingInvoice $incominginvoice): IncomingInvoice
    {
        $incominginvoiceExist = $this->incominginvoiceInterface->findByAccessKey($incominginvoice->getAccessKey());

        if ($incominginvoiceExist) {
            throw new IncomingInvoiceException("Já existe nota fiscal registrada com essa chave de acesso.");
        }

        $result = $this->incominginvoiceInterface->create($incominginvoice);

        return $result;
    }

    public function findManyIncomingInvoices(): array
    {
        return $this->incominginvoiceInterface->findManyIncomingInvoices();
    }

    public function update(IncomingInvoice $incominginvoice): IncomingInvoice
    {
        $incominginvoiceExist = $this->incominginvoiceInterface->findById($incominginvoice->getId());

        if (!$incominginvoiceExist) {
            throw new IncomingInvoiceException("Nota fiscal não encontrada.");
        }

        return $this->incominginvoiceInterface->update($incominginvoice);
    }
}
