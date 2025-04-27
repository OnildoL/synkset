<?php

namespace src\application\interfaces;

interface UserCompanyInterface
{
    public function create(int $userId, int $companyId, int $profileId): void;
    public function findByUserId(int $userId): array;
}
