<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\entities\Company;
use src\application\interfaces\CompanyInterface;

class InMemoryCompanyRepository implements CompanyInterface
{
    private array $companys = [];

    public function create(Company $company): Company
    {
        $this->companys[$company->getId()] = $company;

        return $company;
    }

    public function findByCnpj(string $cnpj): Company|null
    {
        foreach ($this->companys as $company) {
            if ($company->getCnpj() === $cnpj) {
                return $company;
            }
        }
        return null;
    }

    public function findById(int $id): Company|null
    {
        return $this->companys[$id] ?? null;
    }
}
