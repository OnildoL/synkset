<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\Company;
use src\application\entities\Supplier;
use src\application\entities\IncomingInvoice;
use src\application\usecases\incomingInvoiceUseCase;
use src\application\entities\errors\IncomingInvoiceException;
use src\infrastructure\database\repositories\inMemory\InMemoryCompanyRepository;
use src\infrastructure\database\repositories\inMemory\InMemorySupplierRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryIncomingInvoiceRepository;

class IncomingInvoiceTest extends TestCase
{
    private IncomingInvoice $incomingInvoice;
    private incomingInvoiceUseCase $incomingInvoiceUseCase;
    private InMemoryCompanyRepository $companyRepository;
    private InMemorySupplierRepository $supplierRepository;
    private InMemoryIncomingInvoiceRepository $incomingInvoiceRepository;

    private function createDefaultCompany(): void
    {
        $this->companyRepository->create(new Company("company1 LTDA", true, "111111111000111", "Nome do endereço da empresa", "1997", "Shopping Manaíra", "Cabedelo", "São Paulo", "SP", 58087000, 2132000000, 2132000000, new DateTimeImmutable(), 1));
    }

    private function createDefaultSupplier(): void
    {
        $this->supplierRepository->create(new Supplier("Tech Supplies LTDA", "Tech Supplies", "12345678901234", "123456789", "987654321", "contact@techsupplies.com", "11987654321", "Rua das Empresas", "100", "Sala 10", "Centro", "São Paulo", "SP", "01001000", true, new DateTimeImmutable(), 1));
    }

    private function createDefaultIncomingInvoice(): void
    {
        $this->incomingInvoice = new IncomingInvoice(1, 1, "12345", "001", "987654321", "12345678901234567890123456789012345678901234", new DateTimeImmutable(), new DateTimeImmutable(), 100000, 105000, 5000, "Etiqueta123", "Aprovada", false, "Nota fiscal referente à compra de equipamentos.", new DateTimeImmutable(), new DateTimeImmutable(), 1);
    }

    protected function setUp(): void
    {
        $this->companyRepository = new InMemoryCompanyRepository;
        $this->supplierRepository = new InMemorySupplierRepository;
        $this->incomingInvoiceRepository = new InMemoryIncomingInvoiceRepository;
        $this->incomingInvoiceUseCase = new incomingInvoiceUseCase($this->incomingInvoiceRepository);

        $this->createDefaultCompany();
        $this->createDefaultSupplier();
        $this->createDefaultIncomingInvoice();
    }

    public function testItShouldBeAbleToCreateaIncomingInvoice()
    {
        $this->incomingInvoiceUseCase->create($this->incomingInvoice);

        $findByIncomingInvoice = $this->incomingInvoiceRepository->findByAccessKey($this->incomingInvoice->getAccessKey());

        $this->assertNotNull($findByIncomingInvoice);
        $this->assertSame($this->incomingInvoice->getAccessKey(), $findByIncomingInvoice->getAccessKey());
    }

    public function testItShouldReturnNullIfIncomingInvoiceDoesNotExist()
    {
        $nonExistentIncomingInvoiceId = "12345678901234567890123456784012345678901234";

        $findByIncomingInvoice = $this->incomingInvoiceRepository->findByAccessKey($nonExistentIncomingInvoiceId);

        $this->assertNull($findByIncomingInvoice);
    }

    public function testItShouldNotBeAbleToRegisteraIncomingInvoiceWithTheSameIncomingInvoiceAccessKey()
    {
        $this->expectException(IncomingInvoiceException::class);

        $this->incomingInvoiceUseCase->create($this->incomingInvoice);
        $this->incomingInvoiceUseCase->create($this->incomingInvoice);
    }

    public function testItShouldBeAbleToListAllIncomingInvoice()
    {
        $incomingInvoice1 = new IncomingInvoice(1, 1, "12345", "001", "987654321", "12345678901234567890123456789012345678901234", new DateTimeImmutable(), new DateTimeImmutable(), 100000, 105000, 5000, "Etiqueta123", "Aprovada", false, "Nota fiscal referente à compra de equipamentos.", new DateTimeImmutable(), new DateTimeImmutable(), 1); 
        $incomingInvoice2 = new IncomingInvoice(2, 2, "67890", "002", "123456789", "98765432109876543210987654321098765432109876", new DateTimeImmutable(), new DateTimeImmutable(), 200000, 210000, 10000, "Etiqueta456", "Pendente", true, "Nota fiscal referente à compra de materiais.", new DateTimeImmutable(), new DateTimeImmutable(), 2);

        $this->incomingInvoiceUseCase->create($incomingInvoice1);
        $this->incomingInvoiceUseCase->create($incomingInvoice2);

        $incominginvoice = $this->incomingInvoiceUseCase->findManyIncomingInvoices();

        $this->assertCount(2, $incominginvoice);
        $this->assertEquals("12345", $incominginvoice[0]->getNf());
        $this->assertEquals("67890", $incominginvoice[1]->getNf());
    }

    public function testItShouldBeAbleToUpdateaIncomingInvoice()
    {
        $this->incomingInvoiceUseCase->create($this->incomingInvoice);

        $updateIncomingInvoice = new IncomingInvoice(1, 1, "12345", "001", "987654321", "12345678901234567890123456789012345678901234", new DateTimeImmutable(), new DateTimeImmutable(), 100000, 105000, 5000, "Etiqueta123", "Aprovada", false, "Observações alteradas com sucesso", new DateTimeImmutable(), new DateTimeImmutable(), 1);

        $this->incomingInvoiceUseCase->update($updateIncomingInvoice);

        $this->assertEquals("Observações alteradas com sucesso", $updateIncomingInvoice->getObservation());
    }
}
