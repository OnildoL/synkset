<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\application\entities\Profile;
use src\application\usecases\ProfileUseCase;
use src\application\entities\errors\ProfileException;
use src\infrastructure\database\repositories\inMemory\InMemoryProfileRepository;

class ProfileTest extends TestCase
{
    private InMemoryProfileRepository $repository;
    private ProfileUseCase $profileUseCase;

    protected function setUp(): void
    {
        $this->repository = new InMemoryProfileRepository;
        $this->profileUseCase = new ProfileUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->repository);
        unset($this->profileUseCase);
    }

    public function testItShouldBeAbleToCreateaProfile()
    {
        $profile = new Profile("Administrador", 1);

        $this->profileUseCase->create($profile);

        $findByProfile = $this->repository->findById($profile->getId());

        $this->assertNotNull($findByProfile);
        $this->assertSame($profile->getId(), $findByProfile->getId());
    }

    public function testItShouldReturnNullIfProfileDoesNotExist()
    {
        $nonExistentProfileId = 9999;

        $findByProfile = $this->repository->findById($nonExistentProfileId);

        $this->assertNull($findByProfile);
    }

    public function testItShouldNotBeAbleToRegisteraProfileWithTheSameProfilename()
    {
        $this->expectException(ProfileException::class);

        $profile = new Profile("Administrador", 1);

        $this->profileUseCase->create($profile);
        $this->profileUseCase->create($profile);
    }
}
