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

    protected function setUp(): void
    {
        $this->repository = new InMemoryCompanyRepository;
        $this->companyUseCase = new CompanyUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->companyUseCase);
    }

    public function testItShouldBeAbleToCreateaCompany()
    {
        $company = new Company(
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

        $this->companyUseCase->create($company);

        $findByCompany = $this->repository->findById($company->getId());

        $this->assertNotNull($findByCompany);
        $this->assertSame($company->getId(), $findByCompany->getId());
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

        $company = new Company(
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

        $this->companyUseCase->create($company);
        $this->companyUseCase->create($company);
    }
}
