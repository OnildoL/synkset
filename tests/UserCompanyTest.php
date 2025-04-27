<?php

namespace tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use src\application\entities\User;
use src\application\entities\Company;
use src\application\entities\Profile;
use src\application\entities\Permission;
use src\infrastructure\database\repositories\inMemory\InMemoryUserRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryCompanyRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryProfileRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryPermissionRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryUserCompanyRepository;
use src\infrastructure\database\repositories\inMemory\InMemoryProfilePermissionRepository;

class UserCompanyTest extends TestCase
{
    private InMemoryUserRepository $userRepository;
    private InMemoryCompanyRepository $companyRepository;
    private InMemoryProfileRepository $profileRepository;
    private InMemoryPermissionRepository $permissionRepository;
    private InMemoryUserCompanyRepository $userCompanyRepository;
    private InMemoryProfilePermissionRepository $profilePermissionRepository;

    private function createDefaultUser(): void
    {
        $this->userRepository->create(new User("user1", "João de sousa", "email@email.com", "123", true, new DateTimeImmutable(), new DateTimeImmutable(), 1));
    }

    private function createDefaultCompany(): void
    {
        $this->companyRepository->create(new Company(
            "company1 LTDA",
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
        ));
    }

    private function createDefaultProfileAndPermissions(): void
    {
        $this->profileRepository->create(new Profile("Administrador", 1));
        $this->permissionRepository->create(new Permission("products", "Produtos", 1));
        $this->permissionRepository->create(new Permission("notes", "Notas", 2));
    }

    protected function setUp(): void
    {
        $this->userRepository = new InMemoryUserRepository;
        $this->companyRepository = new InMemoryCompanyRepository;
        $this->profileRepository = new InMemoryProfileRepository;
        $this->permissionRepository = new InMemoryPermissionRepository;
        $this->userCompanyRepository = new InMemoryUserCompanyRepository;
        $this->profilePermissionRepository = new InMemoryProfilePermissionRepository($this->permissionRepository);

        $this->createDefaultUser();
        $this->createDefaultCompany();
        $this->createDefaultProfileAndPermissions();
    }

    public function testItShouldListAllPermissionsForUserInCompany()
    {
        $user = $this->userRepository->findById(1);

        $this->assertNotNull($user);

        $company = $this->companyRepository->findById(1);

        $this->assertNotNull($company);

        $profile = $this->profileRepository->findById(1);

        $this->assertNotNull($profile);

        $permission1 = $this->permissionRepository->findByName("products");
        $permission2 = $this->permissionRepository->findByName("notes");

        $this->assertNotNull($permission1);
        $this->assertNotNull($permission2);

        $this->profilePermissionRepository->create($profile->getId(), $permission1->getId());
        $this->profilePermissionRepository->create($profile->getId(), $permission2->getId());

        $this->userCompanyRepository->create($user->getId(), $company->getId(), $profile->getId());

        $userCompany = $this->userCompanyRepository->findByUserId($user->getId());

        $this->assertNotNull($userCompany);

        $profilePermissions = $this->profilePermissionRepository->findManyPermissionByProfile($userCompany[0]["profile_id"]);

        $this->assertCount(2, $profilePermissions);

        $this->assertEquals("products", $profilePermissions[0]->getName());
        $this->assertEquals("notes", $profilePermissions[1]->getName());
    }
}
