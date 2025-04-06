<?php

namespace src\application\usecases;

use src\application\entities\Company;
use src\application\interfaces\CompanyInterface;
use src\application\entities\errors\CompanyException;

class CompanyUseCase
{
    private CompanyInterface $companyInterface;

    public function __construct(CompanyInterface $companyInterface)
    {
        $this->companyInterface = $companyInterface;
    }

    public function create(Company $company): Company
    {
        $companyExist = $this->companyInterface->findByCnpj($company->getCnpj());

        if ($companyExist) {
            throw new CompanyException("Já existe empresa registrada com esse cnpj.");
        }

        $result = $this->companyInterface->create($company);

        return $result;
    }
}
