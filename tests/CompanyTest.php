<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\Company;
use src\application\usecases\CompanyUseCase;
use src\application\entities\errors\CompanyException;
use src\infrastructure\database\repositories\inMemory\InMemoryCompanyRepository;

class CompanyTest extends TestCase
{
    private InMemoryCompanyRepository $repository;
    private CompanyUseCase $companyUseCase;
    private Company $company;

    protected function setUp(): void
    {
        $this->company = new Company(
            "Nome da empresa LTDA",
            true,
            "111111111000111",
            "Nome do endereço da empresa",
            "1997",
            "Shopping Manaíra",
            "Cabedelo",
            "São Paulo",
            "SP",
            58087000,
            2132000000,
            2132000000,
            new DateTimeImmutable(),
            1
        );
        $this->repository = new InMemoryCompanyRepository;
        $this->companyUseCase = new CompanyUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->company);
        unset($this->repository);
        unset($this->companyUseCase);
    }

    public function testItShouldBeAbleToCreateaCompany()
    {
        $this->companyUseCase->create($this->company);

        $findByCompany = $this->repository->findById($this->company->getId());

        $this->assertNotNull($findByCompany);
        $this->assertSame($this->company->getId(), $findByCompany->getId());
    }

    public function testItShouldReturnNullIfCompanyDoesNotExist()
    {
        $nonExistentCompanyId = 9999;

        $findByCompany = $this->repository->findById($nonExistentCompanyId);

        $this->assertNull($findByCompany);
    }

    public function testItShouldNotBeAbleToRegisteraCompanyWithTheSameCompanyname()
    {
        $this->expectException(CompanyException::class);

        $this->companyUseCase->create($this->company);
        $this->companyUseCase->create($this->company);
    }
}
