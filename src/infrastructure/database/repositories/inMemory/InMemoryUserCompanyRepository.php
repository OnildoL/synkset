<?php

namespace src\infrastructure\database\repositories\inMemory;

use src\application\interfaces\UserCompanyInterface;

class InMemoryUserCompanyRepository implements UserCompanyInterface
{
    private array $userCompanies = [];

    public function create(int $userId, int $companyId, int $profileId): void
    {
        $this->userCompanies[] = [
            "user_id" => $userId,
            "company_id" => $companyId,
            "profile_id" => $profileId
        ];
    }

    public function findByUserId(int $userId): array
    {
        return array_filter($this->userCompanies, function ($userCompany) use ($userId) {
            if ($userCompany["user_id"] === $userId) {
                return $userCompany;
            }
        });
    }
}
