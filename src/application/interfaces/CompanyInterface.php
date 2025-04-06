<?php

namespace src\application\interfaces;

use src\application\entities\Company;

interface CompanyInterface
{
    public function create(Company $company): Company;
    public function findByCnpj(string $cnpj): Company|null;
    public function findById(int $id): Company|null;
}
