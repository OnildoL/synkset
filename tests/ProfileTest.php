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
    private Profile $profile;

    protected function setUp(): void
    {
        $this->profile = new Profile("Administrador", 1);
        $this->repository = new InMemoryProfileRepository;
        $this->profileUseCase = new ProfileUseCase($this->repository);
    }

    protected function tearDown(): void
    {
        unset($this->profile);
        unset($this->repository);
        unset($this->profileUseCase);
    }

    public function testItShouldBeAbleToCreateaProfile()
    {
        $this->profileUseCase->create($this->profile);

        $findByProfile = $this->repository->findById($this->profile->getId());

        $this->assertNotNull($findByProfile);
        $this->assertSame($this->profile->getId(), $findByProfile->getId());
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

        $this->profileUseCase->create($this->profile);
        $this->profileUseCase->create($this->profile);
    }
}
