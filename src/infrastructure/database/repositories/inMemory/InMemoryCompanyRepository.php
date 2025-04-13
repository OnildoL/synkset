<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Company;
use src\application\interfaces\CompanyInterface;

class InMemoryCompanyRepository implements CompanyInterface
{
    private array $companies = [];

    public function create(Company $company): Company
    {
        $this->companies[$company->getId()] = $company;

        return $company;
    }

    public function findByCnpj(string $cnpj): Company|null
    {
        foreach ($this->companies as $company) {
            if ($company->getCnpj() === $cnpj) {
                return $company;
            }
        }
        return null;
    }

    public function findById(int $id): Company|null
    {
        return $this->companies[$id] ?? null;
    }

    public function findManyCompanies(): array
    {
        return array_values($this->companies) ?? [];
    }

    public function update(Company $company): Company
    {
        $this->companies[$company->getId()] = $company;

        return $company;
    }
}
